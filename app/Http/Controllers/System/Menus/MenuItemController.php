<?php

namespace App\Http\Controllers\System\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Menus\MenuItemReqest;
use App\Repositories\Menus\MenuItemRepository;

class MenuItemController extends Controller
{
    private $menuItemRepo;
    public function __construct(MenuItemRepository $menuItemRepo)
    {
        $this->menuItemRepo = $menuItemRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->menuItemRepo->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemReqest $request)
    {
        return $this->menuItemRepo->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->menuItemRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuItemReqest $request, string $id)
    {
        return $this->menuItemRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->menuItemRepo->destroy($id);
    }
}
