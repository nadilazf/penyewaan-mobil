<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateSewa extends FormRequest
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
            'id_titip' => 'required',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'id_titip.required' => 'Kolom Nama Kendaraan harus diisi.',
            'tgl_awal.required' => 'Kolom Tanggal Awal Sewa harus diisi.',
            'tgl_akhir.required' => 'Kolom Tanggal Akhir Sewa diisi.',
        ];
    }

}
