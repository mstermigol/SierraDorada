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
        $imagesPath = $imagesPath->storeAndGetFileName($request, 'galleries/'.$galleryName, 'images');
        print_r($imagesPath);
        $newGallery = new Gallery();
        $newGallery->setName($galleryName);
        $newGallery->setImages($imagesPath);

        $newGallery->save();

        return redirect()->route('admin.gallery.index');
    }



}
