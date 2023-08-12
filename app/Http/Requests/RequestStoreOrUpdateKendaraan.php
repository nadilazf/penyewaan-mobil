<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateKendaraan extends FormRequest
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
                'merk' => 'required|string|max:255',
                'jenis' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'nopol' => 'required|max:255',
            ];
    }

    public function messages()
    {
        return [
            'merk.required' => 'kolom Merk Kendaraan harus diisi.',
            'merk.max' => 'Merk Kendaraan tidak boleh lebih dari 255 karakter.',
            'jenis.required' => 'kolom Jenis Kendaraan harus diisi.',
            'jenis.max' => 'Jenis Kendaraan tidak boleh lebih dari 255 karakter.',
            'nama.required' => 'kolom Nama Kendaraan harus diisi.',
            'nama.max' => 'Nama Kendaraan tidak boleh lebih dari 255 karakter.',
            'nopol.required' => 'kolom No Polisi harus diisi.',
            'nama.max' => 'No Polisi tidak boleh lebih dari 255 karakter.',

        ];
    }

}
