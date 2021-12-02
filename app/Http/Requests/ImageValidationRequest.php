<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ImageValidationRequest extends FormRequest
{

    private $rule;
        
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
            'name' => $this->rule,
            'image' => $this->rule .'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->rule = 'required';
    
        if ($this->article) {
            $this->rule = '';
        }
        
        if (request('image')) {
            $originalName = Str::beforeLast(request()->file('image')->getClientOriginalName(), '.');
            $name = Str::slug($originalName . '-' . uniqid());
            $this->merge(['name' => $name]); 
        }
    }
}
