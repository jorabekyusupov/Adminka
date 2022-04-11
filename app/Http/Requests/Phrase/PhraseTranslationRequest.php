<?php

namespace App\Http\Requests\Phrase;

use Illuminate\Foundation\Http\FormRequest;

class PhraseTranslationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'translations.*.id' => ['nullable'],
            'translations.*.object_id' => ['nullable', 'integer'],
            'translations.*.language_code' => ['required', 'string'],
            'translations.*.translation' => ['nullable', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
