<?php

namespace App\Http\Controllers\System\Feedbacks;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Feedbacks\FeedbackReqest;
use App\Repositories\Feedbacks\FeedbackRepository;

class FeedbdackController extends Controller
{
    private $feedbackRepo;
    public function __construct(FeedbackRepository $feedbackRepo)
    {
        $this->feedbackRepo = $feedbackRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->feedbackRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackReqest $request)
    {
        return $this->feedbackRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->feedbackRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeedbackReqest $request, string $id)
    {
        return $this->feedbackRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->feedbackRepo->destroy($id);
    }
}
