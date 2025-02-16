<?php

namespace App\Http\Controllers\System\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Menus\MenuItemReqest;
use App\Repositories\Menus\MenuItemRepository;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new MenuItemRepository())->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemReqest $request)
    {
        return (new MenuItemRepository())->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return (new MenuItemRepository())->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuItemReqest $request, string $id)
    {
        return (new MenuItemRepository())->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return (new MenuItemRepository())->destroy($id);
    }
}
