<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
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
            'id_client' => 'not_in:0',
            'id_item' => 'not_in:0',
            'price' => 'required',
            'quantity' => 'required',
            'discount' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'id_client.required' => 'El selector de "Cliente" no puede estar vacío.',
            'id_item.required' => 'El selector de "Producto" no puede estar vacío.',
            'price.required' => 'El campo "Precio" no puede estar vacío.',
            'quantify.required' => 'El campo "Cantidad" no puede estar vacío.',
            'discount.required' => 'El campo "Descuento(%)" no puede estar vacío.',
        ];
    }
}
