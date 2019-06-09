<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Client;
use Upanel\Http\Requests\ClientUpdateRequest;

class ClientStoreRequest extends FormRequest
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
            'name' => 'required|min:4|max:20',
            'lastname' => 'required|min:4|max:20',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required|min:6|max:200',
            'address' => 'required|min:6|max:200',
            'telephone' => 'required|min:7|max:10',
            'email' => 'required|email'
           

            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio',
            'name.min' => ' nombre minimo puede ser 2 caracteres',
            'name.max' => 'nombre maximo puede ser 20 caracteres',
                  
            'lastname.required' => 'El campo apellido no puede ser vacio',
            'lastname.min' => ' nombre minimo puede ser 2 caracteres',
            'lastname.max' => 'nombre maximo puede ser 20 caracteres',


            'type_doc.not_in' => 'El campo tipo de documento no puede ser vacio',
 


            'num_doc.required' => 'El campo numero de documento no puede ser vacio',
            'num_doc.min' => 'El campo numero de documento minimo puede ser 6 caracteres',
            'num_doc.max' => 'El campo numero de documento maximo puede ser 10 caracteres',

            'address.required' => 'El campo direccion no puede ser vacio',
            'address.min' => 'El campo direccion minimo puede ser 6 caracteres',
            'address.max' => 'El campo direccion maximo puede ser 10 caracteres',

            'telephone.required' => 'El campo telefono no puede ser vacio',
            'telephone.min' => 'El campo telefono minimo puede ser 10 caracteres',
            'telephone.max' => 'El campo telefono maximo puede ser 20 caracteres',

            'email.required' => 'El campo email no puede ser vacio',
            'email.email' => 'El campo correo tiene que ser un correo electronico valido'
            
        ];
}
}