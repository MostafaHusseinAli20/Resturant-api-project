<?php

namespace App\Interfaces\System\Repositories\Customes;

interface CrudRepoEmployeeInterface
{
    public function index();
    public function show(string $id);
    public function update($requset, string $id);
    public function destroy(string $id);
}
