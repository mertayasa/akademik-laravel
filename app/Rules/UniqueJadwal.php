<?php

namespace App\Rules;

use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class UniqueJadwal implements Rule
{
    protected $hari;
    protected $id_tahun_ajar;
    protected $id_kelas;
    protected $id_mapel;
    protected $jam_mulai;
    protected $id_jadwal;
    protected $kelas;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($hari, $id_tahun_ajar, $id_kelas, $id_mapel, $jam_mulai, $id_jadwal)
    {
        $this->hari = $hari;
        $this->id_tahun_ajar = $id_tahun_ajar;
        $this->id_kelas = $id_kelas;
        $this->id_mapel = $id_mapel;
        $this->jam_mulai = $jam_mulai;
        $this->id_jadwal = $id_jadwal;
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
        if($this->id_jadwal == null){
            Log::info($this->id_jadwal);
            $jadwal = Jadwal::where([
                'id_tahun_ajar' => $this->id_tahun_ajar,
                'id_kelas' => $this->id_kelas,
                'id_mapel' => $this->id_mapel,
                'hari' => $this->hari
            ])->get();

            $jadwal_kelas_lain = Jadwal::where([
                'id_tahun_ajar' => $this->id_tahun_ajar,
                'id_mapel' => $this->id_mapel,
                'hari' => $this->hari,
            ])->where('jam_mulai', 'like', explode(':', $this->jam_mulai)[0].'%')->get();
        }else{
            $jadwal = Jadwal::where('id', '!=', $this->id_jadwal)->where([
                'id_tahun_ajar' => $this->id_tahun_ajar,
                'id_kelas' => $this->id_kelas,
                'id_mapel' => $this->id_mapel,
                'hari' => $this->hari
            ])->get();

            $jadwal_kelas_lain = Jadwal::where('id', '!=', $this->id_jadwal)->where([
                'id_tahun_ajar' => $this->id_tahun_ajar,
                'id_mapel' => $this->id_mapel,
                'hari' => $this->hari,
            ])->where('jam_mulai', 'like', explode(':', $this->jam_mulai)[0].'%')->get();
        }
        
        if($jadwal->count() > 0){
            $this->kelas = $jadwal[0]->kelas->jenjang;
        }
        
        if($jadwal_kelas_lain->count() > 0){
            $this->kelas = $jadwal_kelas_lain[0]->kelas->jenjang;
        }

        return ($jadwal->count() > 0) || ($jadwal_kelas_lain->count() > 0) ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // $kelas = Kelas::find($this->id_kelas);
        return 'Mata pelajaran sudah ada di kelas '. $this->kelas .', hari '.$this->hari;
    }
}
