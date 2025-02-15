<?php

namespace App\Http\Controllers\System\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::get();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'event_date' => 'nullable',
            'loacation' => 'required|string',
            'organizer' => 'required|string',
            'description' => 'nullable|string'
        ]);
        $event = Event::create([
            'name' => $request->name,
            'event_date' => now(),
            'loacation' => $request->loacation,
            'organizer' => $request->organizer,
            'description' => $request->description
        ]);
        return response()->json([
            "message" => "Event Adedd Successfuly!",
            "event" => $event
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'event_date' => 'nullable',
            'loacation' => 'required|string',
            'organizer' => 'required|string',
            'description' => 'nullable|string'
        ]);
        $event = Event::find($id);
        $event->update([
            'name' => $request->name,
            'event_date' => now(),
            'loacation' => $request->loacation,
            'organizer' => $request->organizer,
            'description' => $request->description
        ]);
        return response()->json([
            "message" => "Event Adedd Successfuly!",
            "event" => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json([
            "message" => "Event Deleted Successfuly!"
        ]);
    }
}
