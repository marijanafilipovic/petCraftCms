<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    /**
     * @return bool
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
            'user_id' => 'required|int',
            'name' => 'required',
            'old' => 'string',
            'species' => 'string',
            'image' => 'image|mimes:jpg,png, jpeg,gif,svg|max:2048|dimensions:min_width=70,min_height=40,max_width=1000,max_height=1000'

        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your pet name'
        ];
    }
}
