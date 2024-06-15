<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Gallery;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Util\ImageLocalStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdminGalleryController extends Controller
{
    public function index(): View
    {
        $collection = collect(Gallery::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedGalleries = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedGalleries = new LengthAwarePaginator($pagedGalleries, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.gallery.index')]);

        $viewData = [];
        $viewData['galleries'] = $paginatedGalleries;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.gallery.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Gallery::validate($request);

        $galleryName = $request->input('name');

        $imagesPath = new ImageLocalStorage();
        $imagesPath = $imagesPath->storeAndGetFileName($request, 'galleries/' . $galleryName, 'images');
        $newGallery = new Gallery();
        $newGallery->setName($galleryName);
        $newGallery->setImages($imagesPath);

        $newGallery->save();

        return redirect()->route('admin.gallery.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $galleryName = $gallery->getName();
            $folderPath = 'galleries/' . $galleryName;

            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->deleteDirectory($folderPath);
            }

            $gallery->delete();
            return redirect()->route('admin.gallery.index');
        } catch (Exception $e) {
            return redirect()->route('admin.gallery.index')->with('error', 'No se pudo eliminar la galería');
        }
    }

    public function show(string $id): View
    {
        $gallery = Gallery::findOrFail($id);
        $galleryName = $gallery->getName();
        $folderPath = 'galleries/' . $galleryName . '/';

        $viewData = [];
        $viewData['gallery'] = $gallery;
        $viewData['folderPath'] = $folderPath;
        return view('admin.gallery.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $galleryName = $gallery->getName();
            $folderPath = 'galleries/' . $galleryName . '/';

            $viewData = [];
            $viewData['gallery'] = $gallery;
            $viewData['folderPath'] = $folderPath;

            return view('admin.gallery.edit')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.gallery.index');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $gallery = Gallery::findOrFail($id);

        if($gallery->getName() ==! $request->input('name')){
            Gallery::validateName($request);
        }

        Gallery::validateImages($request);


        $previousImages = $gallery->getImages();
        if (!is_array($previousImages)) {
            $previousImages = [];
        }

        if ($request->hasFile('deletedImages')) {
            $deletedImages = $request->file('deletedImages');

            foreach ($deletedImages as $deletedImage) {
                $imagePath = 'galleries/' . $gallery->getName() . '/' . $deletedImage;
                if (($key = array_search($imagePath, $previousImages)) !== false) {
                    unset($previousImages[$key]);

                    if (Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);
                    }
                }
            }

            $previousImages = array_values($previousImages);
        }

        if ($request->hasFile('images')) {
            $galleryName = $gallery->getName();
            $folderPath = 'galleries/' . $galleryName;

            $imageLocalStorage = new ImageLocalStorage();
            $newImages = $imageLocalStorage->storeAndGetFileName($request, $folderPath, 'images');

            $allImages = array_merge($previousImages, $newImages);

            $gallery->setImages($allImages);
        }

        if ($request->has('name')) {
            $galleryName = $gallery->getName();
            $newName = $request->input('name');
            $newFolderPath = 'galleries/' . $newName;
            $folderPath = 'galleries/' . $galleryName;
            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->move($folderPath, $newFolderPath);
            }
            $gallery->setName($request->input('name'));
        }

        $gallery->save();

        return redirect()->route('admin.gallery.index');
    }
}
