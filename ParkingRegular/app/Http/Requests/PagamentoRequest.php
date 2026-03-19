<?php

namespace App\Http\Requests;

use App\Enums\MetodoPagamento;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PagamentoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ticket_id' => ['required', Rule::exists('tickets', 'id')],
            'valor' =>['required', 'numeric'],
            'metodo_pagamento' =>['required', Rule::enum(MetodoPagamento::class)],
            'conta_id' => ['nullable', Rule::exists('contas', 'id')]
        ];
    }
}
