<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnderecoRequest extends FormRequest
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
            'cep' => 'required', 
            'complemento' => 'required', 
            'bairro' => 'required', 
            'localidade' => 'required', 
            'uf' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'required:api', 
            'logradouro.required' => 'required', 
            'complemento.required' => 'required', 
            'bairro.required' => 'required', 
            'localidade.required' => 'required', 
            'uf.required' => 'required'
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
