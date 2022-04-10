<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $referer = Request::server('HTTP_REFERER');
        $today = Carbon::now()->format('Y-m-d');
        $rules = [
            'nama' => ['required', 'max:50', 'min:5'],
            'alamat' => ['required', 'max:100'],
            'tempat_lahir' => ['required', 'max:100'],
            'tgl_lahir' => ['required', 'date', 'before:'.$today],
            'no_tlp' => ['required', 'string', 'max:13'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
        ];

        if($this->method() == 'PATCH'){
            $rules += ['email' => ['required', 'unique:users,email,'.$this->route('user')->id]];
            if(str_contains($referer, 'guru')){
                $rules += ['nip' => ['required', 'numeric', 'unique:users,nip,'.$this->route('user')->id]];
            }
            $rules += ['status' => ['required', Rule::in(['aktif', 'nonaktif'])]];
            if($this->password != null){
                $rules += ['password' => ['required', 'min:6', 'confirmed']];
            };
        }else{
            $rules += ['email' => ['required', 'unique:users,email']];
            $rules += ['password' => ['required', 'min:6', 'confirmed']];
            if(str_contains($referer, 'guru')){
                $rules += ['nip' => ['required', 'numeric', 'unique:users,nip']];
            }
        };
        
        if(str_contains($referer, 'guru') || str_contains($referer, 'ortu')){
            if(str_contains($referer, 'guru')){
                $rules += ['status_guru' => ['required', Rule::in(['tetap', 'honorer', 'bukan_guru'])]];
            }
    
            if(str_contains($referer, 'ortu')){
                $rules += ['pekerjaan' => ['required', 'max:50', 'min:5']];
                $rules += ['nama_ibu' => ['nullable']];
                $rules += ['pekerjaan_ibu' => ['nullable']];
            }
        }else{
            abort(403);
        }

        return $rules;
    }
    
    public function messages()
    {
        return [
            'tgl_lahir.before' => 'Tanggal lahir tidak boleh lebih dari hari ini',
        ];
    }
}
