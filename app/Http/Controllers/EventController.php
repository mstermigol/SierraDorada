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

    public function show(string $id): View
    {
        $event = Event::findOrFail($id);

        $viewData = [];
        $viewData['event'] = $event;

        return view('home.event.show')->with('viewData', $viewData);
    }
}
