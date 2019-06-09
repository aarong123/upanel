<?php

namespace Upanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderUpdateRequest extends FormRequest
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
        $provider = $this->route('provider');

        return [
            'name' => 'required',
            'type_doc' => 'not_in:0',
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
                'type_doc.required' => 'el tipo de documento no puede ser vacio',
                'num_doc.required' => 'el numero de documento no puede ser vacio',
                'address.required' => 'la direccion no puede ser vacio',
                'telephone.required' => 'el telefono no puede ser vacio',
                'email.required' => 'el email no puede ser vacio'
            ];
        }
    }
