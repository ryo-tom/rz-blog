<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'         => ['required', 'max:255', 'unique:posts'],
            'slug'          => ['required', 'max:255', 'unique:posts'],
            'category_id'   => ['required', 'integer'],
            // 'tag_id.*'      => ['integer'],
            'published_at'  => ['nullable', 'date'],
            'content'       => ['required', 'max:16384'],
        ];
    }
}
