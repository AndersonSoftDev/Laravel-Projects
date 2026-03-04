<?php

namespace App\Http\Requests;

use App\Enums\Parking_status;
use App\Enums\Type_spot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParkingSpotRequest extends FormRequest
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
            'parking_id'=>['required', Rule::exists("parkings","id")],
            'code' => ['required', 'string'],
            'type' => ['required', Rule::enum(Type_spot::class)],
            'status' =>['required', Rule::enum(Parking_status::class)]
        ];
    }
}
