<?php

namespace App\Http\Controllers\System\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Events\EventReqest;
use App\Repositories\Events\EventRepository;

class EventController extends Controller
{
    private $eventRepo;
    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->eventRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventReqest $request)
    {
        return $this->eventRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->eventRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventReqest $request, string $id)
    {
        return $this->eventRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->eventRepo->destroy($id);
    }
}
