<?php

namespace App\Http\Requests;

use App\Enums\TipoAdministracao;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LocalizacaoRequest extends FormRequest
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
            'provincia' => ['required', 'string'],
            'distrito'  => ['required', 'string'],
            'localidade' => ['required', 'string'],
            'bairro' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'tipo_administracao' =>['required',Rule::enum(TipoAdministracao::class)],
            'sector_id' =>['required', Rule::exists('sectors', 'id')]
        ];
    }
}
