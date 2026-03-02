<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferenciaRequest extends FormRequest
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
            'conta_origem_id' => ['required',Rule::exists('contas', 'id')],
            'conta_destino_id' => ['required',Rule::exists('contas','id')],
            'valor' =>'required|numeric',
            'descricao'=>'nullable|string'

        ];
    }
}
