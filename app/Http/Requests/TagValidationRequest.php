<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TagValidationRequest extends FormRequest
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

            'tags.*.name' => 'min:3|max:15|not_regex:/".*/i',
        ];
    }

    protected function prepareForValidation()
    {
        if (!request('tags')) {
             return;
        }

        $tagsArray = Str::of(request('tags'))
            ->replace(' ', '')
            ->trim(',')
            ->explode(',')->map(function ($item, $key) {
                return ['name' => $item];
            })->toArray();

        $this->merge([
            'tags' => $tagsArray,
        ]);
    }
}
