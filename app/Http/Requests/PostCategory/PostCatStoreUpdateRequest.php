<?php

namespace App\Http\Requests\PostCategory;

use Illuminate\Foundation\Http\FormRequest;

class PostCatStoreUpdateRequest extends FormRequest
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
            'parent_id' => ['nullable', 'integer'],
            'file' => ['nullable',  'file','image','mimes:jpeg,bmp,png,jpg', 'max:8192'],
            'translations.*.id' => ['nullable'],
            'translations.*.language_code' => ['required', 'string'],
            'translations.*.title' => ['nullable', 'string'],

        ];
    }
}
