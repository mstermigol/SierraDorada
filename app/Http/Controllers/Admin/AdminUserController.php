<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index(): view
    {
        $collection = collect(User::all());
        $itemsPerPage = 6;
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $pagedUsers = $collection->forPage($currentPage, $itemsPerPage);
        $paginatedUsers = new LengthAwarePaginator(
            $pagedUsers,
            $collection->count(),
            $itemsPerPage,
            $currentPage,
            ['path' => route('admin.user.index')]
        );

        $viewData = [];
        $viewData['users'] = $paginatedUsers;

        return view('admin.user.index')->with('viewData', $viewData);
    }
}
