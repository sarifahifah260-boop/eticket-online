<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\KategoriEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('kategoriEvent')->get();
        return view('layouts.event.index', compact('events'));
    }

    public function create()
    {
        $kategoriEvents = KategoriEvent::all();
        return view('layouts.event.create', compact('kategoriEvents'));
    }

    public function store(Request $request)
    {
        Event::create($request->all());

        return redirect()->route('event.index');
    }

    public function show($id)
    {
        $event = Event::with('kategoriEvent')->findOrFail($id);
        return view('layouts.event.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $kategoriEvents = KategoriEvent::all();

        return view('layouts.event.edit', compact('event', 'kategoriEvents'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('event.index');
    }

    public function destroy($id)
    {
        Event::destroy($id);

        return redirect()->route('event.index');
    }
}