<?php

namespace App\Repositories\Reservations;

use App\Interfaces\System\Repositories\CrudRepoInterface;
use App\Models\Reservations;

class ReservationRepository implements CrudRepoInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservations::get();
        return response()->json($reservation);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'table_id' => 'required|exists:tables,id',
            'number_of_people' => 'required|integer',
            'reservations_date' => 'date'
        ]);

        $reservation = Reservations::create([
            'customer_id' => $request->customer_id,
            'table_id' => $request->table_id,
            'number_of_people' => $request->number_of_people,
            'reservations_date' => now()
        ]);
        return response()->json([
            "message" => "Reservation Added Successfuly!",
            "reservation" => $reservation
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservations::find($id);
        return response()->json($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'table_id' => 'required|exists:tables,id' ,
            'number_of_people' => 'required|integer',
            'reservations_date' => 'date'
        ]);
        $reservation = Reservations::find($id);
        $reservation->update([
            'customer_id' => $request->customer_id,
            'table_id' => $request->table_id,
            'number_of_people' => $request->number_of_people,
            'reservations_date' => now()
        ]);
        return response()->json([
            "message" => "Reservation Updated Successfuly!",
            "reservation" => $reservation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservations::find($id);
        $reservation->delete();
        return response()->json([
            "message" => "Reservation Deleted Successfuly!"
        ]);
    }

    public function showCustomerReservation()
    {
        $reservation = Reservations::where('customer_id', auth('customer')->user()->id)->get();
        return response()->json([
            "reservation" => $reservation
        ]);
    }

    public function deleteCustomerReservation()
    {
        Reservations::where('customer_id', auth('customer')->user()->id)->delete();
        return response()->json([
            "message" => "Deleted Reservation By Customer Successfuly!",
        ]);
    }
}