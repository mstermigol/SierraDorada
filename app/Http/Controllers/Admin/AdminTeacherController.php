<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Teacher;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Util\ImageLocalStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class AdminTeacherController extends Controller
{
    public function index(): View
    {
        $collection = collect(Teacher::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedTeachers = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedTeachers = new LengthAwarePaginator($pagedTeachers, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.teacher.index')]);

        $viewData = [];
        $viewData['teachers'] = $paginatedTeachers;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.teacher.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.teacher.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Teacher::validate($request);

        $imageName = new ImageLocalStorage();
        $imageName = $imageName->storeAndGetFileName($request, 'teachers');

        $newTeacher = new Teacher();
        $newTeacher->setName($request->input('name'));
        $newTeacher->setImage($imageName);

        $newTeacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $teacher = Teacher::findOrFail($id);

            if ($teacher->image) {
                Storage::delete('public/teachers/' . $teacher->image);
            }

            $teacher->delete();
        } catch (Exception $e) {
            return redirect()->route('admin.teacher.index');
        }

        return redirect()->route('admin.teacher.index');
    }

    public function edit(string $id): View|RedirectResponse
    {
            $teacher = Teacher::findOrFail($id);
            $viewData = [];
            $viewData['teacher'] = $teacher;

            return view('admin.teacher.edit')->with('viewData', $viewData);

    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $teacher = Teacher::findOrFail($id);

        Teacher::validateUpdate($request);

        $teacher->setName($request->input('name'));

        if ($request->hasFile('image')) {
            if ($teacher->image) {
                Storage::delete('public/teachers/' . $teacher->image);
            }

            $imageName = new ImageLocalStorage();
            $imageName = $imageName->storeAndGetFileName($request, 'teachers');
            $teacher->setImage($imageName);
        }

        $teacher->save();

        return redirect()->route('admin.teacher.index');
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $viewData = [];
            $viewData['teacher'] = $teacher;

            return view('admin.teacher.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.teacher.index');
        }
    }
}
