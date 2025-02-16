<?php

namespace App\Repositories\Menus;

use App\Models\MenuItem;
use App\Models\MenuItemImage;
use Illuminate\Support\Facades\Storage;

class MenuItemRepository 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = MenuItem::get();
        return response()->json([
            "menus" => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        // if ($validator->fails()) {
        //     return response()->json(["errors" => $validator->errors()], 422);
        // }

        $menuItem = MenuItem::create([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "category_id" => $request->category_id,
            "preparation_time" => $request->preparation_time,
        ]);

        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $imagePath = $image->store('menu_item_images', 'public');

                MenuItemImage::create([
                    "menu_item_id" => $menuItem->id,
                    "image_path" => $imagePath,
                ]);
            }
        }

        return response()->json([
            "message" => "Menu Item Added Successfully!",
            "menu_item" => $menuItem,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return response()->json([
            "menu_item" => $menuItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
        // if ($validator->fails()) {
        //     return response()->json(["errors" => $validator->errors()], 422);
        // }

        $menuItem = MenuItem::findOrFail($id);

        $menuItem->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "category_id" => $request->category_id,
            "preparation_time" => $request->preparation_time,
        ]);

        if ($request->hasFile('image_path')) {
            foreach ($request->file('image_path') as $image) {
                $imagePath = $image->store('menu_item_images', 'public');

                MenuItemImage::create([
                    'menu_item_id' => $menuItem->id,
                    "image_path" => $imagePath,
                ]);
            }
        }

        return response()->json([
            "message" => "Menu Item Updated Successfuly!",
            "menu_item" => $menuItem,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menuItem = MenuItem::findOrFail($id);

        $images = $menuItem->images;

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $menuItem->images()->delete();

        $menuItem->delete();

        return response()->json([
            "message" => "Menu Item Deleted Successfuly",
        ]);
    }
}
