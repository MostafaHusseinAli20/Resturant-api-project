<?php

namespace App\Repositories\Events;

use App\Models\Event;

class EventRepository
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
    public function store($request)
    {
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
    public function update($request, string $id)
    {
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