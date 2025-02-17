<?php

namespace App\Http\Controllers\System\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Categories\CategoryRequest;
use App\Repositories\Categories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepo;
    
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->categoryRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       return $this->categoryRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->categoryRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        return $this->categoryRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       return $this->categoryRepo->destroy($id);
    }
}
