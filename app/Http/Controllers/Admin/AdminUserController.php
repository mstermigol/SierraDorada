<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Exception;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $collection = collect(User::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedUsers = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedUsers = new LengthAwarePaginator($pagedUsers, $collection->count(), $itemsPerPage, $currentPage, ['path' => route('admin.user.index')]);

        $viewData = [];
        $viewData['users'] = $paginatedUsers;
        $viewData['delete'] = '¿Estas seguro?';

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.user.create');
    }

    public function save(Request $request): RedirectResponse
    {
        User::validate($request);

        $newUser = new User();
        $newUser->setEmail($request->input('email'));
        $newUser->setPassword(Hash::make($request->input('password')));

        $newUser->save();

        return redirect()->route('admin.user.index');
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            User::destroy($id);

            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            return redirect()->route('admin.user.index');
        }
    }

    public function edit(string $id): View|RedirectResponse
    {
            $user = User::findOrFail($id);
            $viewData = [];
            $viewData['user'] = $user;

            return view('admin.user.edit')->with('viewData', $viewData);

    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($request->filled('password')) {
            User::validatePassword($request);
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->input('email') !== $user->email) {
            User::validateEmail($request);
            $user->email = $request->input('email');
        }

        $user->save();

        return redirect()->route('admin.user.index');
    }
}
