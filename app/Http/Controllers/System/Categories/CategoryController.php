<?php

namespace App\Http\Controllers\System\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Categories\CategoryRequest;
use App\Repositories\Categories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new CategoryRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        return (new CategoryRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new CategoryRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return (new CategoryRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new CategoryRepository())->destroy($id);
    }
}
