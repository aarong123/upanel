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
            'quantity' =>'required'

        ];
    }
    public function messages()
    {
        return [
            'id_entry.required' => 'El campo de la id de compra no puede ser vacio',
            'id_item.required' => 'El campo de la id de productos no puede ser vacio',
            'price.required' => 'El campo de precio no puede ser vacio',
            'quantity.required' => 'El campo cantidad no puede ser vacio'
            
        ];
    }
}