<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project)],
            'image' => ['nullable', 'image', 'max:955'],
            'description_en' => 'nullable',
            'description_it' => 'nullable',
            'year_of_development' => 'nullable',
            'repository_url' => 'nullable',
            'website_url' => 'nullable',
            'type_id' => ['exists:types,id', 'nullable'],
        ];
    }
}
