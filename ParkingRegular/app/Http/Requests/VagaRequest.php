<?php

namespace App\Http\Requests;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VagaRequest extends FormRequest
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
            'tipo' =>['required', Rule::enum(TipoVeiculo::class)],
            'status' =>['required', Rule::enum(StatusVaga::class)],
            'bloco_id'=>['required', Rule::exists('blocos', 'id')]
        ];
    }
}
