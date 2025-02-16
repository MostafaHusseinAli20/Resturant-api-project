<?php

namespace App\Http\Controllers\System\Hero;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Hero\HeroReqest;
use App\Repositories\Hero\HeroRepository;

class HeroSectionController extends Controller
{
    public function index()
    {
       return (new HeroRepository())->index();
    }
    public function store(HeroReqest $request)
    {
       return (new HeroRepository())->store($request);
    }
}
