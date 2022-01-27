<?php

namespace App\Rules;

use App\Models\Jadwal;
use Illuminate\Contracts\Validation\Rule;

class UniqueJadwal implements Rule
{
    protected $hari;
    protected $id_tahun_ajar;
    protected $id_kelas;
    protected $id_mapel;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($hari, $id_tahun_ajar, $id_kelas, $id_mapel)
    {
        $this->hari = $hari;
        $this->id_tahun_ajar = $id_tahun_ajar;
        $this->id_kelas = $id_kelas;
        $this->id_mapel = $id_mapel;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $jadwal = Jadwal::where([
            'id_tahun_ajar' => $this->id_tahun_ajar,
            'id_kelas' => $this->id_kelas,
            'id_mapel' => $this->id_mapel,
            'hari' => $this->hari
        ])->count();

        return $jadwal > 0 ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Mata pelajaran sudah ada di hari '.$this->hari;
    }
}
