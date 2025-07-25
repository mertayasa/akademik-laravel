<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PengumumanRequest extends FormRequest
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
            'judul' => ['required', 'string', 'min:5', 'max:255'],
            'konten' => ['required', 'string', 'min:5', 'max:2000'],
            'lampiran' => ['nullable'],
            'status' => ['required', Rule::in(['aktif', 'nonaktif'])],
        ];
    }
}
