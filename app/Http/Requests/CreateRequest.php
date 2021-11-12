<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:150',
            'body' => 'required|min:60',
            'description' => 'required|min:20|max:255',
            'slug' => [
                'required',
                Rule::unique('articles')->ignore($this->article, 'slug')
            ],
            'published_at' => 'nullable|date'
        ];
    }

    protected function prepareForValidation()
    {
        if (request('is_published')) {
            $this->merge([
                'published_at' => Carbon::now()
            ]);
        }

        if ($this->article) {
            $slug = $this->article->slug;
        } else {
            $slug = Str::slug(request('title') . uniqid());
        }

        $this->merge([
            'slug' => $slug,
        ]);
    }
}
