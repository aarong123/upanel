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
            'id_entry' => 'not_in:0',
            'id_item' => 'not_in:0',
            'price' => 'required',
            'quantity' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'id_entry.required' => 'El campo de "Productos" no puede estar vacío.',
            'id_item.required' => 'El campo de "Proveedores" no puede estar vacío.',
            'price.required' => 'El campo "Precio" no puede estar vacío.',
            'quantity.required' => 'El campo "Cantidad" no puede estar vacío.'

        ];
    }
}