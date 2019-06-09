<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'category_id' => 'not_in:0',
            'name' => 'required|min:6|unique:items|max:200',
            'code' => 'required|min:6|unique:items|max:200',
            'price_sale' => 'required',
            'stock' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'El selector de categorias no puede estar vacio',
            'name.required' => 'El campo nombre no puede estar vacio',
            'name.min' => 'El campo nombre minimo debe tener 6 caracteres',
            'name.unique' => 'el nombre debe ser unico',
            'code.required' => 'El campo codigo no puede estar vacio',
            'code.min' => 'El campo codigo minimo deben tener 6 caracteres',
            'code.unique' => 'El codigo debe ser unico',
            'price_sale.required' => 'El campo precio no puede estar vacio',
            'stock.required' => 'El campo stock no puede estar vacio',
        ];
    }
}
