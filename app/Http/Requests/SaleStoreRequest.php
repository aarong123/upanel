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
        'id_client.required' => 'El selector de clientes no puede estar vacio',
        'id_item.required' => 'El selector de productos no puede estar vacio',
        'price.required' => 'El campo codigo no puede estar vacio',
        'quantify.required' => 'El campo codigo no puede estar vacio',
        'discount.required' => 'El campo descuento no puede estar vacio',
    ];
}
}
