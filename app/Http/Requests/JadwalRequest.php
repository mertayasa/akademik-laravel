<?php

namespace App\Http\Requests;

use App\Rules\DayExists;
use App\Rules\UniqueJadwal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class JadwalRequest extends FormRequest
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
        $rule = [
            'id_kelas' => ['required', 'exists:kelas,id'],
            'id_tahun_ajar' => ['required', 'exists:tahun_ajar,id'],
            'id_guru' => ['required', 'exists:users,id'],
            'hari' => ['required', Rule::in(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'])],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'id_mapel' => ['required', 'exists:mapel,id', new UniqueJadwal($this->hari, $this->id_tahun_ajar, $this->id_kelas, $this->id_mapel)],
        ];

        return $rule;
    }

    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json([

                'errors' => $validator->errors()

            ],400)
        );
    }
}
