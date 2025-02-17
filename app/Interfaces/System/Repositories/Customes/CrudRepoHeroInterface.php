<?php

namespace App\Interfaces\System\Repositories\Customes;

interface CrudRepoHeroInterface
{
    public function index();
    public function store($requset);
}
