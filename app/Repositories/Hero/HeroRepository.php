<?php

namespace App\Repositories\Hero;

use App\Interfaces\System\Repositories\Customes\CrudRepoHeroInterface;
use App\Models\HeroSection;

class HeroRepository implements CrudRepoHeroInterface
{
    public function index()
    {
        $sections = HeroSection::get();
        return response()->json([
            "hero" => $sections,
        ]);
    }
    public function store($request)
    {
        // if($validator->fails()){
        //     return response()->json($validator->errors()->toJson(), 400);
        // }
        
        if ($request->hasFile('media_path')) {
            $media_path = $request->file('media_path')->store('video_hero_section', 'public');

            $video_path = HeroSection::create([
                'title' => $request->title,
                'media_path'=> $media_path
            ]);

            return response()->json(['message' => 'Video uploaded successfully!', 'video' => $video_path], 201);
        }
        return response()->json(['message' => 'No video uploaded'], 400);
    }
}