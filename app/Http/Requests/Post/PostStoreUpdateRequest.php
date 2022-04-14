<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreUpdateRequest extends FormRequest
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
            'created_date' => ['nullable', 'datetime'],
            'views_count' => ['nullable', 'integer'],
            'keywords' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:8196'],
            'translations.*.id' => ['nullable'],
            'translations.*.language_code' => ['required', 'string'],
            'translations.*.title' => ['nullable', 'string'],
            'translations.*.sub_title' => ['nullable', 'string'],
            'translations.*.description' => ['nullable', 'string'],
        ];
    }
}
