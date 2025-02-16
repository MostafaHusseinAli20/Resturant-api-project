<?php

namespace App\Http\Controllers\System\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Promotions\PromotionRequest;
use App\Repositories\Promotions\PromotionRepository;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new PromotionRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        return (new PromotionRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new PromotionRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionRequest $request, string $id)
    {
        return (new PromotionRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new PromotionRepository())->destroy($id);
    }
}
