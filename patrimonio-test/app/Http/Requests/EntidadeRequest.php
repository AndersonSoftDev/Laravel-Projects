<?php

namespace App\Http\Requests;

use App\Enums\Designacao;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EntidadeRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:80'],
            'codigo' =>['required', 'string', 'max:10'],
            'designacao' =>['required',Rule::enum(Designacao::class)]
        ];
    }
}
