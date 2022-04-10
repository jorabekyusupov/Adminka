<?php

namespace App\Http\Requests\PhraseTranslation;

use Illuminate\Foundation\Http\FormRequest;

class PhraseTranslationUpdateRequest extends FormRequest
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
            'object_id' => ['required'],
            'language_code' => ['required'],
            'translation' => ['required']
        ];
    }
}
