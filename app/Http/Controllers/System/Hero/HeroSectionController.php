<?php

namespace App\Http\Controllers\System\Hero;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Hero\HeroReqest;
use App\Repositories\Hero\HeroRepository;

class HeroSectionController extends Controller
{
   private $heroRepo;
   public function __construct(HeroRepository $heroRepo)
   {
      $this->heroRepo = $heroRepo;
   }
   public function index()
   {
      return $this->heroRepo->index();
   }
   public function store(HeroReqest $request)
   {
      return $this->heroRepo->store($request);
   }
}
