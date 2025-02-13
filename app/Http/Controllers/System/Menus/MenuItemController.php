<?php

namespace App\Http\Controllers\System\Menus;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuItemController extends Controller
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "nullable",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
            "preparation_time" => "nullable|integer",
            "image_path.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

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
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "nullable",
            "price" => "required",
            "category_id" => "required",
            "preparation_time" => "nullable",
            "image_path.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

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
