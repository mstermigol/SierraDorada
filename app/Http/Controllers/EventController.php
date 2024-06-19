<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::all();

        $viewData = [];
        $viewData['events'] = $events;

        return view('home.event.index')->with('viewData', $viewData);
    }
}
