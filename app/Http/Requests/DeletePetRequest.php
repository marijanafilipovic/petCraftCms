<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeletePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'petId' => 'required|int'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'id.int' => 'Something went wrong'
        ];
    }
}
