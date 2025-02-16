<?php

namespace App\Http\Controllers\System\Reservations;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Reservations\ReservationRequest;
use App\Repositories\Reservations\ReservationRepository;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return (new ReservationRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        return (new ReservationRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return (new ReservationRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequest $request, string $id)
    {
        return (new ReservationRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return (new ReservationRepository())->destroy($id);
    }

    public function showCustomerReservation()
    {
       return (new ReservationRepository())->showCustomerReservation();
    }

    public function deleteCustomerReservation()
    {
        return (new ReservationRepository())->deleteCustomerReservation();
    }
}
