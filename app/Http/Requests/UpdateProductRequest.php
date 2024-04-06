<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:64',
            'price' => 'decimal:0,2',
            'photo' => 'file|mimes:bmp,jpeg,png,jpg,gif',
            'category_id' => 'integer|exists:categories,id'
        ];
    }
}
