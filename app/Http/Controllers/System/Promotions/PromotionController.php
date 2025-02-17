<?php

namespace App\Http\Controllers\System\Promotions;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Promotions\PromotionRequest;
use App\Repositories\Promotions\PromotionRepository;

class PromotionController extends Controller
{
    private $promotionRepo;
    public function __construct(PromotionRepository $promotionRepo)
    {
        $this->promotionRepo = $promotionRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->promotionRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionRequest $request)
    {
        return $this->promotionRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->promotionRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionRequest $request, string $id)
    {
        return $this->promotionRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->promotionRepo->destroy($id);
    }
}
