<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
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
          'codigo' => 'required',
          'hora_inicial' => 'required',
          'hora_final' => 'required',
          'fecha_inicial' => 'required',
          'fecha_final' => 'required',
        ];
    }
}
