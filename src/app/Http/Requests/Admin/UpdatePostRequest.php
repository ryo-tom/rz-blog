<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            'title'         => ['required', 'max:255', $this->uniqueRule()],
            'slug'          => ['required', 'max:255', $this->uniqueRule()],
            'category_id'   => ['required', 'integer'],
            // 'tag_id.*'      => ['integer'],
            'published_at'  => ['nullable', 'date'],
            'content'       => ['required', 'max:16384'],
        ];
    }

    /**
     * Define my custom validation rule that ignores soft-deleted records.
     *
     * @return \Illuminate\Validation\Rules\Unique
     */
    private function uniqueRule(): \Illuminate\Validation\Rules\Unique
    {
        $post = $this->route('post');
        return Rule::unique('posts')->ignore($post);
    }
}
