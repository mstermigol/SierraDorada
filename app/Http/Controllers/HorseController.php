<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\View\View;

class HorseController extends Controller
{
    public function index(): View
    {
        $horses = Horse::all();

        $viewData = [];
        $viewData['horses'] = $horses;

        return view('home.horse.index')->with('viewData', $viewData);
    }
}
