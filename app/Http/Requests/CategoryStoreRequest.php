<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name' => 'required|min:6|unique:categories|max:200'

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'El campo nombre no puede ser vacio',
            'name.min' => 'El campo nombre minimo debe tener 6 caracteres',
            'name.unique' => 'El nombre debe ser unico',
            'name.max' => 'El campo nombre maximo pueden tener 200 caracteres',
        ];
    }
}
