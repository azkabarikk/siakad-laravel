<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Mahasiswa;

class StoreMahasiswaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'nim' => 'required|string|size:' . Mahasiswa::PANJANG_NIM . '|unique:mahasiswa,nim',
        'nama' => 'required|string|min:3|max:100',
        'id_prodi' => 'required|exists:prodi,id_prodi',
        ];
    }

    public function messages(): array
    {
    return [
        'nim.required' => 'NIM wajib diisi.',
        'nama.min' => 'Nama minimal 3 karakter.',
        ];
    }

}
