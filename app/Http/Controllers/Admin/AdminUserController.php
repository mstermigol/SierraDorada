<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): view
    {
        return view('admin.user.index');
    }
}
