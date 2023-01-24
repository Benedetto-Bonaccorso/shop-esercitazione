<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'name-' . $this->category->id => [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category->id),
                'max:100'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->errorBag = "update-" . $this->category->id;
    }
}
