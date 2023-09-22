<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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
            'content'       => ['required', 'max:16384'],
            'is_published'  => ['required', 'in:0,1'],
        ];
    }

    /**
     * Define my custom validation rule
     *
     * @return \Illuminate\Validation\Rules\Unique
     */
    private function uniqueRule(): \Illuminate\Validation\Rules\Unique
    {
        $page = $this->route('page');
        return Rule::unique('pages')->ignore($page);
    }
}
