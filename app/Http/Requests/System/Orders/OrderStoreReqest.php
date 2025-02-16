<?php

namespace App\Http\Requests\System\Orders;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreReqest extends FormRequest
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
            "delivery_address" => "required",
            "total_amount" => "nullable",
            "special_instructions" => "nullable",
        ];
    }
}
