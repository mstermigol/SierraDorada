<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sportsman;
use App\Util\ImageLocalStorage;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminSportsmanController extends Controller
{
    public function index(): View
    {
        $collection = collect(Sportsman::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedSportsman = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedSportsman = new LengthAwarePaginator($pagedSportsman, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.sportsman.index')]);

        $viewData = [];
        $viewData['sportsman'] = $paginatedSportsman;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.sportsman.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.sportsman.create');
    }

    public function save(Request $request): RedirectResponse
    {
        if (Sportsman::count() > 0) {
            return redirect()
                ->back()
                ->withErrors(['sportsman' => 'Solo puede haber 1 deportista.']);
        }

        Sportsman::validate($request);

        $imageName = new ImageLocalStorage();
        $imageName = $imageName->storeAndGetFileName($request, 'sportsman');

        $newSportsman = new Sportsman();
        $newSportsman->setName($request->input('name'));
        $newSportsman->setImage($imageName);

        $newSportsman->save();

        return redirect()->route('admin.sportsman.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $sportsman = Sportsman::findOrFail($id);

            if ($sportsman->image) {
                Storage::delete('public/sportsman/'.$sportsman->image);
            }

            $sportsman->delete();

            return redirect()->route('admin.sportsman.index');
        } catch (Exception $e) {
            return redirect()->route('admin.sportsman.index');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        $sportsman = Sportsman::findOrFail($id);
        $viewData = [];
        $viewData['sportsman'] = $sportsman;

        return view('admin.sportsman.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $sportsman = Sportsman::findOrFail($id);

        Sportsman::validate($request);

        $sportsman->setName($request->input('name'));

        if ($request->hasFile('image')) {
            $imageName = new ImageLocalStorage();
            $imageName = $imageName->storeAndGetFileName($request, 'sportsman');

            if ($sportsman->image) {
                Storage::delete('public/sportsman/'.$sportsman->image);
            }

            $sportsman->setImage($imageName);
        }

        $sportsman->save();

        return redirect()->route('admin.sportsman.index');
    }

    public function show(string $id): View
    {
        try {
            $sportsman = Sportsman::findOrFail($id);
            $viewData = [];
            $viewData['sportsman'] = $sportsman;

            return view('admin.sportsman.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.sportsman.index');
        }
    }

}
