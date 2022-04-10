<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EkskulRequest extends FormRequest
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
        $rules = [];
        
        if($this->method() == 'PATCH'){
            $rules += ['nama' => ['required', 'max:50', 'unique:ekskul,nama,'.$this->route('ekskul')->id]];
            $rules += ['status' => ['required', Rule::in(['aktif', 'nonaktif'])]];
        }else{
            $rules += ['nama' => ['required', 'max:50', 'unique:ekskul,nama']];
        };

        return $rules;
    }
}
