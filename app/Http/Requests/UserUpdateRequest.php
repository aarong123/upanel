<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $person = $this->route('person');
        $user = $this->route('user');
        return [
            'name' => 'required|min:4|max:20',
            'lastname' => 'required|min:4|max:30',
            'address' => 'required|min:8|max:50',
            'telephone' => 'required|min:7|max:10',
            'type_doc' => 'not_in:0',
            'num_doc' => 'required|min:8|max:12',
            'email' => 'required|email',
            'user' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'not_in:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo "Nombre(s)" no puede estar vacío.',
            'name.min' => 'El campo "Nombre(s)" debe ser de mínimo 4 letras.',
            'name.max' => 'El campo "Nombre(s)" debe ser de máximo 20 letras.',

            'lastname.required' => 'El campo "Apellido(s)" no puede estar vacío.',
            'lastname.min' => 'El campo "Apellido(s)" debe ser de mínimo 4 letras.',
            'lastname.max' => 'El campo "Apellido(s)" debe ser de máximo 30 letras.',

            'address.required' => 'El campo "Dirección de residencia" no puede estar vacío.',
            'address.min' => 'El campo "Dirección de residencia" debe ser de mínimo 8 caracteres.',
            'address.max' => 'El campo "Dirección de residencia" debe ser de máximo 50 caracteres.',

            'telephone.required' => 'El campo "Número telefónico" no puede estar vacío.',
            'telephone.min' => 'El campo "Número telefónico" debe ser de mínimo 7 dígitos.',
            'telephone.max' => 'El campo "Número telefónico" debe ser de máximo 10 dígitos.',

            'type_doc.not_in' => 'El selector de "Tipo de documento" no puede estar vacío.',

            'num_doc.required' => 'El campo "Número de documento de identidad" no puede estar vacío.',
            'num_doc.min' => 'El campo "Número de documento de identidad" debe ser de mínimo 8 dígitos.',
            'num_doc.max' => 'El campo "Número de documento de identidad" debe ser de máximo 12 dígitos.',

            'email.required' => 'El campo "Correo electrónico" no puede estar vacío.',
            'email.required' => 'Ingrese un dirección de correo electrónico correcta.',

            'user.unique' => 'El campo "Nombre de usuario" debe ser único.',
            'user.required' => 'El campo "Nombre de usuario" no puede estar vacío.',

            'password.required' => 'El campo "Contraseña" no puede estar vacío.',

            'role_id.required' => 'El selector de "Rol" no puede estar vacío.'
        ];
    }
}
