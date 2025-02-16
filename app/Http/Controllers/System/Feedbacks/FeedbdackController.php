<?php

namespace App\Http\Controllers\System\Feedbacks;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Feedbacks\FeedbackReqest;
use App\Repositories\Feedbacks\FeedbackRepository;

class FeedbdackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new FeedbackRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackReqest $request)
    {
        return (new FeedbackRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new FeedbackRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeedbackReqest $request, string $id)
    {
        return (new FeedbackRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new FeedbackRepository())->destroy($id);
    }
}
