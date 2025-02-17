<?php

namespace App\Interfaces\System\Repositories;

interface CrudRepoInterface
{
    public function index();
    public function store($requset);
    public function show(string $id);
    public function update($requset, string $id);
    public function destroy(string $id);
}
