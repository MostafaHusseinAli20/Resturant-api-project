<?php

namespace App\Http\Controllers\System\Reservations;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Reservations\ReservationRequest;
use App\Repositories\Reservations\ReservationRepository;

class ReservationController extends Controller
{
    private $ReservationRepo;
    public function __construct(ReservationRepository $ReservationRepo)
    {
        $this->ReservationRepo = $ReservationRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->ReservationRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        return $this->ReservationRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->ReservationRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, string $id)
    {
        return $this->ReservationRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->ReservationRepo->destroy($id);
    }

    public function showCustomerReservation()
    {
        return $this->ReservationRepo->showCustomerReservation();
    }

    public function deleteCustomerReservation()
    {
        return $this->ReservationRepo->deleteCustomerReservation();
    }
}
