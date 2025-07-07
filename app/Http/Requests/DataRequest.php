<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'id' => 'required',
            'pic' => 'required|max:255',
            'perusahaan' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Missing value of ID',
            'pic.required' => 'Missing value of PIC',
            'pic.max' => 'Invalid length of PIC, max 255 characters',
            'perusahaan.required' => 'Missing value of Perusahaan',
            'perusahaan.max' => 'Invalid length of Perusahaan, max 255 characters',
        ];
    }
}
