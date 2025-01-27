<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePicketRequest extends FormRequest
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
            'tim' => 'required',
            'day_picket' => 'required',
            'student_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tim.required' => 'Wajib diisi',
            'day_picket.required' => 'Wajib diisi',
            'student_id.required' => 'Wajib diisi',
        ];
    }
}
