<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'image' => 'nullable|max:255',
            'description' => 'nullable',
            'year_of_development' => 'nullable',
            'repository_url' => 'nullable',
            'website_url' => 'nullable',
        ];
    }
}
