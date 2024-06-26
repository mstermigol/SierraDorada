<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use App\Util\ImageLocalStorage;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminTestimonyController extends Controller
{
    public function index(): View
    {
        $collection = collect(Testimony::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedTestimonies = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedTestimonies = new LengthAwarePaginator($pagedTestimonies, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.testimony.index')]);

        $viewData = [];
        $viewData['testimonies'] = $paginatedTestimonies;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.testimony.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.testimony.create');
    }

    public function save(Request $request): RedirectResponse
    {
        $existingTestimoniesCount = Testimony::count();

        if ($existingTestimoniesCount >= 3) {
            return redirect()->back()->withErrors(['error' => 'Cannot create more than 3 testimonies.']);
        }

        Testimony::validate($request);

        $imageName = new ImageLocalStorage();
        $imageName = $imageName->storeAndGetFileName($request, 'testimonies');

        $newTestimony = new Testimony();
        $newTestimony->setName($request->input('name'));
        $newTestimony->setTestimony($request->input('testimony'));
        $newTestimony->setImage($imageName);

        $newTestimony->save();

        return redirect()->route('admin.testimony.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $testimony = Testimony::findOrFail($id);

            if ($testimony->image) {
                Storage::delete('public/testimonies/'.$testimony->image);
            }

            $testimony->delete();

            return redirect()->route('admin.testimony.index');
        } catch (Exception $e) {
            return redirect()->route('admin.testimony.index');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
        $testimony = Testimony::findOrFail($id);
        $viewData = [];
        $viewData['testimony'] = $testimony;

        return view('admin.testimony.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $testimony = Testimony::findOrFail($id);

        Testimony::validateUpdate($request);

        $testimony->setName($request->input('name'));
        $testimony->setTestimony($request->input('testimony'));

        if ($request->hasFile('image')) {
            if ($request->file('image') !== null) {
                Storage::delete('public/testimonies/'.$testimony->image);
            }

            $imageName = new ImageLocalStorage();
            $imageName = $imageName->storeAndGetFileName($request, 'testimonies');
            $testimony->setImage($imageName);
        }

        $testimony->save();

        return redirect()->route('admin.testimony.index');
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $testimony = Testimony::findOrFail($id);
            $viewData = [];
            $viewData['testimony'] = $testimony;

            return view('admin.testimony.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.testimony.index');
        }
    }
}
