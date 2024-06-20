<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::all();

        $viewData = [];
        $viewData['galleries'] = $galleries;

        return view('home.gallery.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $gallery = Gallery::find($id);

        $viewData = [];
        $viewData['gallery'] = $gallery;

        return view('home.gallery.show')->with('viewData', $viewData);
    }
}
