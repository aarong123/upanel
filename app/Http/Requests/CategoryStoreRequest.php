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
            'name' => 'required|min:6|unique:categories|max:30'

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'El campo "Nombre" no puede estar vacío.',
            'name.min' => 'El campo "Nombre" debe ser de mínimo 6 letras.',
            'name.unique' => 'El nombre debe ser único.',
            'name.max' => 'El campo "Nombre" debe ser de máximo 30 letras.'
        ];
    }
}
