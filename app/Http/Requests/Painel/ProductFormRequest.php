<?php

namespace App\Http\Requests\Painel;

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
            'name'          => 'required|min:3|max:100',
            'number'        => 'required',
            'category'      => 'required',
            'description'   => 'min:3|max:1000',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'O campo nome é de preenchimento obrigatório',
        'number.required' => 'O campo numero é de preenchimento obrigatório',
        'number.numeric' => 'Precisa ser somente números',
        'category.required' => 'Selecione um Categoria',
        'description.min' => 'Tem que ter mais de 3 caracteres'
        ];
    }
}
