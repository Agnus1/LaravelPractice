<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarValidationRequest extends FormRequest
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
                Rule::requiredIf(request()->method == 'POST'),
                Rule::unique('cars')->ignore($this->car)
            ],
            'body' => [
                Rule::requiredIf(request()->method == 'POST'),
            ],
            'price' => [
                Rule::requiredIf(request()->method == 'POST'),
                'numeric',
            ],
            'old_price' => 'numeric',
            'car_body_id' => 'numeric|exists:car_bodies,id',
        ];
    }


}
