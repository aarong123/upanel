<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
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
        $request =\Request::all();
        $item = $this->route('item');
        return [
            'category_id' => 'not_in:0',
            'code' => 'required|min:6|max:200|unique:items,code,' . $item,
            'name' => 'required|min:6|max:200|unique:items,name,' . $item,
            'price_sale' => 'required',
            'expiration_date' => 'required',
            'stock' => 'required',
            'stock_threshold' => 'required',
            'expiration_threshold' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'El selector de "Categorías" no puede estar vacío.',

            'code.required' => 'El campo "Código" no puede estar vacío.',
            'code.min' => 'El campo "Código" debe ser de mínimo 6 caracteres.',
            'code.max' => 'El campo "Código" debe ser de máximo 50 caracteres.',
            'code.unique' => 'El código debe ser único.',

            'name.required' => 'El campo "Nombre" no puede estar vacío.',
            'name.min' => 'El campo "Nombre" debe ser de mínimo 6 letras.',
            'name.max' => 'El campo "Nombre" debe ser de máximo 20 letras.',
            'name.unique' => 'El nombre debe ser único',

            'price_sale.required' => 'El campo "Precio de venta del producto" no puede estar vacío.',

            'expiration_date.required' => 'El selector de "Fecha de vencimiento" no puede estar vacío.',

            'stock.required' => 'El campo "Stock" no puede estar vacío.',

            'stock_threshold.required' => 'El campo "Umbral de stock" no puede estar vacío.',

            'expiration_threshold.required' => 'El campo "Umbral de expiración" no puede estar vacío.'
        ];
    }
}
