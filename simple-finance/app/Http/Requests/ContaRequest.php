<?php

namespace App\Http\Requests;

use App\Enums\TipoConta;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContaRequest extends FormRequest
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
            'tipo_conta' => ['required', Rule::enum(TipoConta::class)],
            'moeda' => 'required|string|max:3',
            'saldo' => 'nullable|numeric',
            'activo' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
