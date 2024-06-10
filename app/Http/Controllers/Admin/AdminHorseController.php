<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Horse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Util\ImageLocalStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdminHorseController extends Controller
{
    public function index(): View
    {
        $collection = collect(Horse::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedHorses = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedHorses = new LengthAwarePaginator($pagedHorses, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.horse.index')]);

        $viewData = [];
        $viewData['horses'] = $paginatedHorses;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.horse.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.horse.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Horse::validate($request);

        $imagePath = new ImageLocalStorage();
        $imagePath = $imagePath->storeAndGetFileName($request, 'horses');

        $newHorse = new Horse();
        $newHorse->setName($request->input('name'));
        $newHorse->setDescription($request->input('description'));
        $newHorse->setImage($imagePath);

        $newHorse->save();

        return redirect()->route('admin.horse.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $horse = Horse::findOrFail($id);

            if ($horse->image) {
                Storage::delete('public/horses/' . $horse->image);
            }

            $horse->delete();

            return redirect()->route('admin.horse.index');
        } catch (Exception $e) {
            return redirect()->route('admin.horse.index');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        try {
            $horse = Horse::findOrFail($id);
            $viewData = [];
            $viewData['horse'] = $horse;

            return view('admin.horse.edit')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.horse.index');
        }
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $horse = Horse::findOrFail($id);

        Horse::validateUpdate($request);

        if ($request->hasFile('image')) {
            if ($horse->image) {
                Storage::delete('public/horses/' . $horse->image);
            }

            $imageLocalStorage = new ImageLocalStorage();
            $imageFileName = $imageLocalStorage->storeAndGetFileName($request, 'horses');

            $horse->setImage($imageFileName);
        } else {
            $horse->setImage($horse->getImage());
        }

        $horse->setName($request->input('name'));
        $horse->setDescription($request->input('description'));


        $horse->save();

        return redirect()->route('admin.horse.index');
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $horse = Horse::findOrFail($id);
            $viewData = [];
            $viewData['horse'] = $horse;

            return view('admin.horse.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.horse.index');
        }
    }
}
