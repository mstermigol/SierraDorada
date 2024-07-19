<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Sportsman;
use App\Models\Teacher;
use App\Models\Testimony;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $services = Service::where('in_landing', 1)->get();
        $teachers = Teacher::all();
        $testimonies = Testimony::all();
        $sportsman = Sportsman::all();

        $viewData = [];
        $viewData['services'] = $services;
        $viewData['teachers'] = $teachers;
        $viewData['testimonies'] = $testimonies;
        $viewData['sportsman'] = $sportsman;

        return view('home.landing')->with('viewData', $viewData);
    }
}
