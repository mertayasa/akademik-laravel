<?php

namespace App\Http\Requests;

use App\Rules\UniqueAnggota;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class AnggotaKelasReq extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id_siswa' => ['required', 'exists:siswa,id', new UniqueAnggota($this->id_kelas, $this->id_tahun_ajar)],
            'id_kelas' => ['required', 'exists:kelas,id'],
            'id_tahun_ajar' => ['required', 'exists:tahun_ajar,id'],
        ];
    }

    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json([

                'errors' => $validator->errors()

            ],400)
        );
    }
}
