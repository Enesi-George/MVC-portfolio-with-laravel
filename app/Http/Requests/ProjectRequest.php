<?php

namespace App\Http\Requests;

use App\Data\ProjectData;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        //Redirect back with errors

        throw new HttpResponseException(Redirect::back()->withErrors($errors)->withInput());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'skill_id' => 'required|exists:skills,id',
            'name' => 'required|string',
            'project_url' => 'nullable|string',
            'image' => 'nullable|file|mimes:png,jpeg,jpg|max:5120',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.*' => 'Unsupported file type',

        ];
    }

    public function ProjectDTO(): ProjectData
    {
        return new ProjectData(
            skill_id: $this->skill_id,
            name: $this->name,
            project_url: $this->project_url,
            image: $this->hasFile('image') ? $this->file('image')->hashName() : null,

        );
    }
}
