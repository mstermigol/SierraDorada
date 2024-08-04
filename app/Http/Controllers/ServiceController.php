<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::all();

        $viewData = [];
        $viewData['services'] = $services;

        return view('home.service.index')->with('viewData', $viewData);
    }

    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $viewData = [];
        $viewData['service'] = $service;

        return view('home.service.show')->with('viewData', $viewData);
    }
}
