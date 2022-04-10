<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LangUpdateRequest extends FormRequest
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
        $id = $this->route('language');
        $name = request()->input('name');
        $code = request()->input('code');
        $unique = Rule::unique('languages')
            ->where(function ($query) use ($name, $code) {
                return $query->where('name', $name)
                    ->where('code', $code);
            });
        if (request()->isMethod('PUT')) {
            $unique = $unique->ignore($id);
        }
        return [
            'name' => ['required', $unique],
            'code' => ['required', $unique]
        ];
    }
}
