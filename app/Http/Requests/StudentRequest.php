<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            //
            'code'  => 'required|max:10',
            'name'  => 'required|max:191',
            'email'  => 'required|max:191|unique:students',
            'phone'  => 'required|max:20',
            'image'  => 'required|image',
        ];
    }
}
