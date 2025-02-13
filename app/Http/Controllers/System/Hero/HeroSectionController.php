<?php

namespace App\Http\Controllers\System\Hero;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeroSectionController extends Controller
{
    //
    public function index()
    {
        $sections = HeroSection::get();
        return response()->json([
            "hero" => $sections,
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" => "required",
           "media_path" => "required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-matroska|max:20480", // 20 MGB
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
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
