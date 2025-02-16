<?php

namespace App\Http\Requests\System\Menus;

use Illuminate\Foundation\Http\FormRequest;

class MenuItemReqest extends FormRequest
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
            "name" => "required",
            "description" => "nullable",
            "price" => "required|numeric",
            "category_id" => "required|exists:categories,id",
            "preparation_time" => "nullable|integer",
            "image_path.*" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }
}
