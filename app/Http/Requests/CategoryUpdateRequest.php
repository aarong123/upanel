<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
        $category = $this->route('category');

        return [
            
            'name' => 'required|min:6|max:30|unique:categories,name,' . $category
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
