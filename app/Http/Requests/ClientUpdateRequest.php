<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
        $client = $this->route('client');
        return [
            'name' => 'required',
            'lastname' => 'required',
            'type_doc' => 'required',
            'num_doc' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio',
            'lastname.required' => 'El campo apellido no puede ser vacio',
            'type_doc.required' => 'El campo tipo de documento no puede ser vacio',
            'num_doc.required' => 'El campo numero de documento no puede ser vacio',
            'address.required' => 'El campo direccion no puede ser vacio',
            'telephone.required' => 'El campo telefono no puede ser vacio',
            'email.required' => 'El campo correo no puede ser vacio'
            
        ];
    }
}