<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use PDO;

class ActivoRequest extends FormRequest
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
            'nip' => ['nullable', 'string', 'max:255'],

            'tipo_inventario' => ['required', 'string', 'max:100'],

            'tipo_comprovativo' => ['nullable', 'string', 'max:100'],

            'nr_comprovativo' => ['nullable', 'string', 'max:100'],

            'seguro' => ['boolean'],

            'assistencia_tecnica' => ['boolean'],

            'data_garantia' => ['nullable', 'date'],

            'status' => ['required', 'string', 'max:100'],

            'uge_id' => [
                'required',
                Rule::exists('entidades', 'id')->where(function ($query) {
                    $query->where('designacao', 'Uge');
                })
            ],
            'ugb_id' => [
                'required',
                Rule::exists('entidades', 'id')->where(function ($query) {
                    $query->where('designacao', 'Ugb');
                }),
            ],

            'sector_id' => [
                'required',
                Rule::exists('sectors', 'id')->where(function($query){
                    $query->where('entidade_id',request('ugb_id'));
                })
            ],

            'fornecedor_id' => [
                'nullable',
                Rule::exists('fornecedors', 'id')
            ],
        ];
    }
}
