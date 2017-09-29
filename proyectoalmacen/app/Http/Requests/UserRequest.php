<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
          'documento' => 'required',
          'name' => 'required',
          'apellido' => 'required',
          'telefono' => 'required',
          'email' => 'required',
          'rol' => 'required',
          'password' => 'required',
        ];
    }
    public function messages()
    {
        return[
        'documento.required' => 'El Campo Nombre Es Requerido.',
        'name.required' => 'El Campo Nombre Es Requerido.',
        'apellido.required' => 'El Campo Apellido Es Requerido.',
        'telefono.required' => 'El Campo Telefono Es Requerido.',
        'email.required' => 'El Campo Correo Electronico Es Requerido.',
        'rol.required' => 'El Campo Rol Es Requerido.',
        'password.required' => 'El Campo Passwords Es Requerido.',
        ];
    }
}
