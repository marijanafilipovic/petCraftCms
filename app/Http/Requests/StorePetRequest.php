<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       // return auth()->user()->is_admin;
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
