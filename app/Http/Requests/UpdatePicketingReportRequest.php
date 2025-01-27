<?php

namespace App\Http\Requests;

use App\Enum\PicketingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePicketingReportRequest extends FormRequest
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
            'description' => 'required|max:1000',
            'proof' => 'nullable|mimes:png,jpg,jpeg'
        ];
    }


    public function messages()
    {
        return [
            'description.required' => 'Deskripsi harus diisi',
            'description.max' => 'Deskripsi tidak boleh lebih dari 1000 karakter',
            'proof.mimes' => 'Format bukti pembayaran tidak sesuai',
            'proof.nullable' => 'Bukti pembayaran tidak boleh kosong'
        ];
    }
}
