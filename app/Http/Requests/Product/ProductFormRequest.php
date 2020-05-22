<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|string'
        ];
    }

    public function messages()
    {

        return [
            'name.string'   => 'O campo :attribute é inválido.',
            'name.required' => 'O campo :attribute é inválido.',
            'code.string'   => 'O campo :attribute é inválido.',
            'code.required' => 'O campo :attribute é inválido.',
        ];
    }
}
