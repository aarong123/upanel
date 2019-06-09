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
            'name' => 'required|min:2|max:200',
            'lastname' => 'required|min:2|max:200',
            'email' => 'required|email',
            'role_id' => 'not_in:0',
            'user' => 'required|unique:users',
            'password' => 'required',
    
            ];
    }
    public function messages()
    {
        return [
            'role_id.required' => 'El selector de roles no puede estar vacio',
            'name.required' => 'El campo nombre no puede estar vacio',
            'name.min' => 'El campo nombre minimo debe tener 6 caracteres',
            'name.max' => 'El campo nombre maximo puede tener 200 caracteres',
            'lastname.required' => 'El campo apellido no puede estar vacio',
            'lastname.min' => 'El campo apellido minimo debe tener 6 caracteres',
            'lastname.max' => 'El campo apellido maximo puede tener 200 caracteres',
            'email.required' => 'El campo email no puede estar vacio',
            'User.unique' => 'El campo usuario debe ser unico',
            'User.required' => 'El campo usuario no puede estar vacio',
            'User.required' => 'El campo contraseña no puede estar vacio',
        ];
    }
}
