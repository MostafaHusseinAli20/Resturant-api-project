<?php

namespace App\Http\Controllers\System\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Events\EventReqest;
use App\Repositories\Events\EventRepository;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new EventRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventReqest $request)
    {
        return (new EventRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new EventRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventReqest $request, string $id)
    {
        return (new EventRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new EventRepository())->destroy($id);
    }
}
