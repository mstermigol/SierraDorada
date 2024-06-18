<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Util\ImageLocalStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdminEventController extends Controller
{
    public function index(): View
    {
        $collection = collect(Event::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedEvents = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedEvents = new LengthAwarePaginator($pagedEvents, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.event.index')]);

        $viewData = [];
        $viewData['events'] = $paginatedEvents;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.event.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.event.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Event::validate($request);

        $eventTitle = $request->input('title');

        $imageMiniatureName = new ImageLocalStorage();
        $imageMiniatureName = $imageMiniatureName->storeAndGetFileName($request, 'events/' . $eventTitle, 'imageMiniature');


        $imagesName = new ImageLocalStorage();
        $imagesName = $imagesName->storeAndGetFileName($request, 'events/' . $eventTitle . '/images', 'images');
        $newEvent = new Event();
        $newEvent->setTitle($eventTitle);
        $newEvent->setDescriptionMiniature($request->input('descriptionMiniature'));
        $newEvent->setImageMiniature($imageMiniatureName);
        $newEvent->setDescription($request->input('description'));
        $newEvent->setImages($imagesName);

        $newEvent->save();

        return redirect()->route('admin.event.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $event = Event::findOrFail($id);
            $eventTitle = $event->getTitle();
            $folderPath = 'events/' . $eventTitle;

            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->deleteDirectory($folderPath);
            }

            $event->delete();
            return redirect()->route('admin.event.index');
        } catch (Exception $e) {
            return redirect()->route('admin.event.index');
        }
    }

    public function show(string $id): View
    {
        $event = Event::findOrFail($id);
        $eventTitle = $event->getTitle();
        $folderPath = 'events/' . $eventTitle . '/images/';
        $folderMiniaturePath = 'events/' . $eventTitle . '/';

        $viewData = [];
        $viewData['event'] = $event;
        $viewData['images'] = $folderPath;
        $viewData['miniature'] = $folderMiniaturePath;

        return view('admin.event.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View|RedirectResponse
    {
            $event = Event::findOrFail($id);
            $eventTitle = $event->getTitle();
            $folderPath = 'events/' . $eventTitle . '/images/';
            $folderMiniaturePath = 'events/' . $eventTitle . '/';


            $viewData = [];
            $viewData['event'] = $event;
            $viewData['images'] = $folderPath;
            $viewData['miniature'] = $folderMiniaturePath;

            return view('admin.event.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $event = Event::findOrFail($id);

        Event::validate($request);

        $event->setDescriptionMiniature($request->input('descriptionMiniature'));
        $event->setDescription($request->input('description'));

        $eventTitle = $event->getTitle();
        $folderPath = 'events/' . $eventTitle . '/images/';
        $folderMiniaturePath = 'events/' . $eventTitle . '/';

        $previousImages = $event->getImages();
        if (!is_array($previousImages)) {
            $previousImages = [];
        }

        if ($request->hasFile('imageMiniature')) {
            if ($request->file('imageMiniature') !== null){
                Storage::delete('public/' . $folderMiniaturePath . $event->getImageMiniature());
            }

            $imageMiniatureName = new ImageLocalStorage();
            $imageMiniatureName = $imageMiniatureName->storeAndGetFileName($request, $folderMiniaturePath, 'imageMiniature');

            $event->setImageMiniature($imageMiniatureName);
        }

        if ($request->has('deletedImages')){
            $deletedImages = json_decode($request->input('deletedImages'));

            if (!empty($deletedImages)) {
                foreach ($deletedImages as $deletedImage) {
                    $imagePath = $folderPath . $deletedImage;

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
            $eventTitle = $event->getTitle();
            $folderPath = 'events/' . $eventTitle . '/images/';

            $imageLocalStorage = new ImageLocalStorage();
            $imagesName = $imageLocalStorage->storeAndGetFileName($request, $folderPath, 'images');

            $allImages = array_merge($previousImages, $imagesName);
            $event->setImages($allImages);
        } else {
            $event->setImages($previousImages);
        }

        if ($request->has('title')) {
            $eventTitle = $event->getTitle();
            $newName = $request->input('title');
            $newFolderPath = 'events/' . $newName;
            $folderPath = 'events/' . $eventTitle;
            if (Storage::disk('public')->exists($folderPath)) {
                Storage::disk('public')->move($folderPath, $newFolderPath);
            }
            $event->setTitle($request->input('title'));
        }

        $event->save();

        return redirect()->route('admin.event.index');
    }

}
