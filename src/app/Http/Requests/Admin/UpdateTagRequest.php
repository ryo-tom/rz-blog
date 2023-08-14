<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
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
            'name'       => ['required','max:255', $this->uniqueRule()],
            'slug'       => ['required','max:255', $this->uniqueRule()],
            'sort_order' => ['nullable', 'integer'],
        ];
    }

    /**
     * Define my custom validation rule that ignores the current record and soft-deleted records.
     *
     * @return \Illuminate\Validation\Rules\Unique
     */
    private function uniqueRule(): \Illuminate\Validation\Rules\Unique
    {
        $tag = $this->route('tag');

        return Rule::unique('tags')->ignore($tag);
    }
}
