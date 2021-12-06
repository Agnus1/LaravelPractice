<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ImageValidationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                Rule::requiredIf(is_null($this->article)),
            ],
            'image' => [
                Rule::requiredIf(is_null($this->article)),
                'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        ];
    }
    
    protected function prepareForValidation()
    {
        if (request('image')) {
            $originalName = Str::beforeLast(request()->file('image')->getClientOriginalName(), '.');
            $name = Str::slug($originalName . '-' . uniqid());
            $this->merge(['name' => $name]); 
        }
    }
}
