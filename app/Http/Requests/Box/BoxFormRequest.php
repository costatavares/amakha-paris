<?php

namespace App\Http\Requests\Box;

use Illuminate\Foundation\Http\FormRequest;

class BoxFormRequest extends FormRequest
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
            'name' => 'required|string'
        ];
    }

    public function messages()
    {

        return [
            'name.string'   => 'O campo :attribute é inválido.',
            'name.required' => 'O campo :attribute é inválido.',
        ];
    }
}
