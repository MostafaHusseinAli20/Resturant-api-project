<?php

namespace App\Http\Controllers\System\Tables;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Tables\TableRequest;
use App\Repositories\Tables\TableRepository;

class TableController extends Controller
{
    private $tableRepo;
    public function __construct(TableRepository $tableRepo)
    {
        $this->tableRepo = $tableRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->tableRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        return $this->tableRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->tableRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        return $this->tableRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->tableRepo->destroy($id);
    }
}
