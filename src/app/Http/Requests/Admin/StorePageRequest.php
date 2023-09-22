<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'         => ['required', 'max:255', 'unique:pages'],
            'slug'          => ['required', 'max:255', 'unique:pages'],
            'content'       => ['required', 'max:16384'],
            'is_published'  => ['required', 'in:0,1'],
        ];
    }
}
