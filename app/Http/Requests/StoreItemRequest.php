<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:items,title|max:100',
            'cover_image' => 'nullable|image|max:255',
            'categories' => 'nullable|exists:categories,id|max:255',
            'body' => 'nullable|max:10000'
        ];
    }
}
