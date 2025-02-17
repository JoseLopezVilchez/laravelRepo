<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:200'], //tambien puedes pasarlo asi: 'required|string|max:200'
            'apellidos' => ['required', 'string', 'max:200'],
            'edad' => ['required', 'int', 'gt:17'], //gt = greater than
            'direccion' => ['required', 'string', 'max:200'],
            'nacimiento' => ['required', 'date']
        ];
    }

    public function mensajes () {
        return [
            'required' => 'El campo :attribute es obligatorio',
            'gt' => 'La :attribute debe ser mayor de :value',
            'max' => 'El campo :attribute no puede tener más de :max caracteres',
        ];
    }

    public function attributes () : array {
        return [
            'direccion' => 'direccion',
            'nacimiento' => 'fecha de nacimiento',

        ];
    }
}
