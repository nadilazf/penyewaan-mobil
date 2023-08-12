<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateTitip extends FormRequest
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
            'id_kendaraan' => 'required',
            'tgl_titip' => 'required|date',
            'harga_sewa' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'id_kendaraan.required' => 'Kolom Nama Kendaraan harus diisi.',
            'tgl_titip.required' => 'Kolom tanggal titip harus diisi.',
            'harga_sewa.required' => 'Kolom harga sewa harus diisi.',
            'harga_sewa.integer' => 'Harga sewa harus berisi angka.',
        ];
    }

}
