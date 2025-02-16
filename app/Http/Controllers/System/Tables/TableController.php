<?php

namespace App\Http\Controllers\System\Tables;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Tables\TableRequest;
use App\Repositories\Tables\TableRepository;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new TableRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        return (new TableRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new TableRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        return (new TableRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new TableRepository())->destroy($id);
    }
}
