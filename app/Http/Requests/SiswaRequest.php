<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaRequest extends FormRequest
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
        $today = Carbon::now()->format('Y-m-d');
        $rules = [
            'nama' => ['required', 'max:50', 'min:5'],
            'email' => ['required'],
            'alamat' => ['required', 'max:100'],
            'tempat_lahir' => ['required', 'max:50'],
            'tgl_lahir' => ['required', 'date', 'before:'.$today],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'id_user' => ['required', 'exists:users,id'],
            'agama' => ['required'],
            'sikap_spiritual' => ['nullable'],
            'sikap_sosial' => ['nullable'],
            'saran' => ['nullable'],

        ];
        
        if($this->method() == 'PATCH'){
            $rules += ['nis' => ['required', 'numeric', 'digits_between:10,10', 'unique:siswa,nis,'.$this->route('siswa')->id]];
            $rules += ['status' => ['required', Rule::in(['aktif', 'nonaktif'])]];
        }else{
            $rules += ['nis' => ['required', 'numeric', 'digits_between:10,10', 'unique:siswa,nis']];
        };

        return $rules;
    }

    public function messages()
    {
        return [
            'tgl_lahir.before' => 'Tanggal lahir tidak boleh lebih dari hari ini',
            'nis.digits_between' => 'Panjang NIS harus 10 digit angka',
        ];
    }
}
