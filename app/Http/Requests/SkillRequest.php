<?php

namespace App\Http\Requests;

use App\Data\SkillsData;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SkillRequest extends FormRequest
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
            'name' => 'required|string',
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

    public function SkillsDTO(): SkillsData
    {
        return new SkillsData(
            name: $this->name,
            //handle the image seperately or set it to null
            image: $this->hasFile('image') ? $this->file('image')->hashName() : null,
        );
    }
}
