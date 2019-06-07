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
            'name' => 'required|min:6|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio',
            'name.min' => 'minimo puede ser 6 caracteres'
        ];
    }
}
