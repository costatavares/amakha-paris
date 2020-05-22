<?php

namespace App\Http\Requests\ProductBox;

use Illuminate\Foundation\Http\FormRequest;

class ProductBoxFormRequest extends FormRequest
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
            'idBox'     => 'required|integer',
            'howMuchFit'=> 'required|integer'
        ];
    }

    public function messages()
    {

        return [
            'idBox.integer'       => 'O campo :attribute é inválido.',
            'idBox.required'      => 'O campo :attribute é inválido.',
            'howMuchFit.integer'  => 'O campo :attribute é inválido.',
            'howMuchFit.required' => 'O campo :attribute é inválido.',
        ];
    }
}
