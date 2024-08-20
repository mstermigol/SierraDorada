<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Util\ImageLocalStorage;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    public function index(): View
    {
        $collection = collect(service::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedEvents = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedEvents = new LengthAwarePaginator($pagedEvents, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.service.index')]);

        $viewData = [];
        $viewData['services'] = $paginatedEvents;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.service.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.service.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Service::validate($request);

        $inLanding = $request->input('inLanding');
        if ($inLanding === '1' && Service::where('in_landing', '1')->count() >= 3) {
            return redirect()
                ->back()
                ->withErrors(['inLanding' => 'There can only be 3 events maximum in the landing page.']);
        }

        $serviceName = $request->input('name');

        $imageMiniatureName = new ImageLocalStorage();
        $imageMiniatureName = $imageMiniatureName->storeAndGetFileName($request, 'services/'.$serviceName, 'imageMiniature');
        $imagesName = new ImageLocalStorage();
        $imagesName = $imagesName->storeAndGetFileName($request, 'services/'.$serviceName.'/images', 'images');
        $newService = new Service();
        $newService->setName($serviceName);
        $newService->setSlug($serviceName);
        $newService->setDescriptionMiniature($request->input('descriptionMiniature'));
        $newService->setImageMiniature($imageMiniatureName);
        $newService->setDescription($request->input('description'));
        $newService->setImages($imagesName);
        $newService->setPriceWeekday($request->input('priceWeekday'));
        $newService->setPriceWeekend($request->input('priceWeekend'));
        $newService->setInLanding($request->input('inLanding'));

        $newService->save();

        return redirect()->route('admin.service.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $service = Service::findOrFail($id);
            $serviceName = $service->getName();
            $folderPath = 'services/'.$serviceName;

            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->deleteDirectory($folderPath);
            }

            $service->delete();

            return redirect()->route('admin.service.index');
        } catch (Exception $e) {
            return redirect()->route('admin.service.index');
        }
    }

    public function show(string $id): View
    {
        $service = Service::findOrFail($id);
        $serviceName = $service->getName();
        $folderPath = 'services/'.$serviceName.'/images/';
        $folderMiniaturePath = 'services/'.$serviceName.'/';

        $viewData = [];
        $viewData['service'] = $service;
        $viewData['images'] = $folderPath;
        $viewData['miniature'] = $folderMiniaturePath;

        return view('admin.service.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $service = Service::findOrFail($id);
        $serviceName = $service->getName();
        $folderPath = 'services/'.$serviceName.'/images/';
        $folderMiniaturePath = 'services/'.$serviceName.'/';

        $viewData = [];
        $viewData['service'] = $service;
        $viewData['images'] = $folderPath;
        $viewData['miniature'] = $folderMiniaturePath;

        return view('admin.service.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        Service::validate($request);

        $inLanding = $request->input('inLanding');
        if ($inLanding === '1' && Service::where('in_landing', '1')->count() >= 3 && $service->getInLanding() === 0) {
            return redirect()
                ->back()
                ->withErrors(['inLanding' => 'There can only be 3 events maximum in the landing page.']);
        }

        $service->setDescriptionMiniature($request->input('descriptionMiniature'));
        $service->setDescription($request->input('description'));
        $service->setPriceWeekday($request->input('priceWeekday'));
        $service->setPriceWeekend($request->input('priceWeekend'));
        $service->setInLanding($request->input('inLanding'));

        $serviceName = $service->getName();
        $folderPath = 'services/'.$serviceName.'/images/';
        $folderMiniaturePath = 'services/'.$serviceName.'/';

        $previousImages = $service->getImages();
        if (! is_array($previousImages)) {
            $previousImages = [];
        }

        if ($request->hasFile('imageMiniature')) {
            if ($request->file('imageMiniature') !== null) {
                Storage::disk('public')->delete($folderMiniaturePath.$service->getImageMiniature());
            }

            $imageMiniatureName = new ImageLocalStorage();
            $imageMiniatureName = $imageMiniatureName->storeAndGetFileName($request, $folderMiniaturePath, 'imageMiniature');

            $service->setImageMiniature($imageMiniatureName);
        }

        if ($request->has('deletedImages')) {
            $deletedImages = json_decode($request->input('deletedImages'));

            if (! empty($deletedImages)) {
                foreach ($deletedImages as $deletedImage) {
                    $imagePath = $folderPath.$deletedImage;

                    if (($key = array_search($deletedImage, $previousImages)) !== false) {
                        unset($previousImages[$key]);

                        if (Storage::disk('public')->exists($imagePath)) {
                            Storage::disk('public')->delete($imagePath);
                        }
                    }
                }

                $previousImages = array_values($previousImages);
            }
        }

        if ($request->hasFile('images')) {
            $serviceName = $service->getName();
            $folderPath = 'services/'.$serviceName.'/images/';

            $imageLocalStorage = new ImageLocalStorage();
            $imagesName = $imageLocalStorage->storeAndGetFileName($request, $folderPath, 'images');

            $allImages = array_merge($previousImages, $imagesName);
            $service->setImages($allImages);
        } else {
            $service->setImages($previousImages);
        }

        if ($request->has('name')) {
            $serviceName = $service->getName();
            $newName = $request->input('name');
            $newFolderPath = 'services/'.$newName;
            $folderPath = 'services/'.$serviceName;
            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->move($folderPath, $newFolderPath);
            }
            $service->setName($request->input('name'));
            $service->setSlug($request->input('name'));
        }

        $service->save();

        return redirect()->route('admin.service.index');
    }
}
