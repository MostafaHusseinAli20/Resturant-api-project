<?php

namespace App\Http\Requests\System\Hero;

use Illuminate\Foundation\Http\FormRequest;

class HeroReqest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required",
           "media_path" => "required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-matroska|max:20480", // 20 MGB
        ];
    }
}
