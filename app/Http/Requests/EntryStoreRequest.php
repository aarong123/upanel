<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryStoreRequest extends FormRequest
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
            'item_id' => 'not_in:0',
            'provider_id' => 'not_in:0',
            'quantity' => 'required',
            'price' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'item_id.required' => 'El selector de "Producto" no puede estar vacío.',
            'provider_id.required' => 'El selector de "Proveedor" no puede estar vacío.',
            'quantity.required' => 'El campo "Cantidad" no puede estar vacío.',
            'price.required' => 'El campo "Precio" no puede estar vacío.'
        ];
    }
}
