<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'category_slug' => ['nullable', 'string', 'max:255'],
            'tag_slugs'     => ['nullable', 'array'],
            'tag_slugs.*'   => ['nullable', 'string', 'max:255'],
            'tag_option'    => ['nullable', 'string', 'in:or,and'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            '*' => 'Invalid request ... ;( ',
        ];
    }
}
