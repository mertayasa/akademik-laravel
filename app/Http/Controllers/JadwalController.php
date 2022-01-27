<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\User;
use App\Models\TahunAjar;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadeRequest;
use App\DataTables\JadwalDataTable;
use App\Http\Requests\JadwalRequest;
use App\Models\AnggotaKelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::where('status', 'aktif')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function indexGuru()
    {
        $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
        $jadwal = Jadwal::with('kelas')->where('status', 'aktif')->where('id_tahun_ajar', $tahun_ajar_active->id)->get()->sortBy('kelas.id');
        
        $data = [
            'groupped_jadwal' => $jadwal->groupBy('kelas.id')
        ];

        return view('jadwal.index_guru', $data);
    }

    public function indexOrtu(Request $request)
    {
        $id_ortu = Auth::id();
        $siswa = Siswa::where('id_user', $id_ortu)->pluck('nama', 'id');
        $id_siswa = $request->input('id_siswa', null);
        
        if(isset($id_siswa)){
            $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
            $anggota_kelas = AnggotaKelas::where('id_siswa', $id_siswa)->where('id_tahun_ajar', $tahun_ajar_active->id)->first();
            if($anggota_kelas){
                $jadwal = Jadwal::with('kelas')->where('id_kelas', $anggota_kelas->id_kelas)->where('status', 'aktif')->where('id_tahun_ajar', $tahun_ajar_active->id)->get()->sortBy('kelas.id');
                if(count($jadwal) > 0){
                    $groupped_jadwal = $jadwal->groupBy('kelas.id');
                };
            }
        }

        $data = [
            'id_siswa' => $id_siswa,
            'siswa' => $siswa,
            'groupped_jadwal' => $groupped_jadwal ?? null,
        ];

        return view('jadwal.index_ortu', $data);
    }

    public function datatableGuru()
    {
        $tahun_ajar_active = TahunAjar::where('status', 'aktif')->first();
        $jadwal = Jadwal::where('id_guru', Auth::id())->where('status', 'aktif')->where('id_tahun_ajar', $tahun_ajar_active->id)->get();
        return JadwalDataTable::set($jadwal);
    }

    public function datatable($id_kelas, $id_tahun_ajar)
    {
        $jadwal = Jadwal::where('id_kelas', $id_kelas)->where('id_tahun_ajar', $id_tahun_ajar)->get();
        return JadwalDataTable::set($jadwal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jadwal $jadwal)
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        $mapel = Mapel::where('status', 'aktif')->pluck('nama', 'id');
        return view('jadwal.create', compact('kelas', 'tahun_ajar', 'user', 'jadwal', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        try {
            $data = $request->all();
            $data['kode_hari'] = getDayCode($request->hari);
            $jadwal = DB::transaction(function() use($data) {
                return Jadwal::create($data);
            }, 5);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            if($request->ajax()){
                return response(['code' => 0, 'message' => 'Gagal menambahkan data jadwal']);
            }
            return redirect()->back()->withInput()->with('error', 'Data jadwaln Gagal Ditambahkan');
        }

        if($request->ajax()){
            $table_mapel = $this->renderNilaiMapelTable($jadwal->id_kelas, $jadwal->id_tahun_ajar);
            return response(['code' => 1, 'message' => 'Berhasil menambahkan data jadwal', 'table' => $table_mapel]);
        }

        return redirect('jadwal')->with('success', 'Data jadwal Berhasil Ditambahkan');
    }

    private function renderNilaiMapelTable($id_kelas, $id_tahun_ajar)
    {
        $mapel_of_jadwal = Jadwal::geetUniqueMapel($id_tahun_ajar, $id_kelas);
        $data = [
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'mapel_of_jadwal' => $mapel_of_jadwal
        ];

        return view('nilai.table_mapel', $data)->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $user = User::where('level', 'guru')->where('status', 'aktif')->pluck('nama', 'id');
        $tahun_ajar = TahunAjar::pluck('keterangan', 'id');
        $kelas = Kelas::where('status', 'aktif')->pluck('kode', 'id');
        $mapel = Mapel::where('status', 'aktif')->pluck('nama', 'id');
        return view('jadwal.create', compact('kelas', 'tahun_ajar', 'user', 'jadwal', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, Jadwal $jadwal)
    {
        try {
            $data = $request->all();
            $data['kode_hari'] = getDayCode($request->hari);
            DB::transaction(function() use($data, $request, $jadwal) {
                $anggota_kelas = AnggotaKelas::where('id_kelas', $data['id_kelas'])->where('id_tahun_ajar', $data['id_tahun_ajar'])->get();
                // foreach($anggota_kelas as $anggota){
                //     Nilai::updateOrCreate([
                //         'id_anggota_kelas' => $anggota->id,
                //         'id_mapel' => $data['id_mapel'],
                //         'semester' => 'ganjil'
                //     ],[
                //         'id_anggota_kelas' => $anggota->id,
                //         'id_mapel' => $data['id_mapel'],
                //     ]);

                //     Nilai::updateOrCreate([
                //         'id_anggota_kelas' => $anggota->id,
                //         'id_mapel' => $data['id_mapel'],
                //         'semester' => 'genap'
                //     ],[
                //         'id_anggota_kelas' => $anggota->id,
                //         'id_mapel' => $data['id_mapel'],
                //     ]);
                // }

                $jadwal->update($request->validated());
                
            }, 5);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            if($request->ajax()){
                return response(['code' => 0, 'message' => 'Gagal mengubah data jadwal']);
            }
            return redirect()->back()->withInput()->with('error', 'Data jadwaln Gagal Ditambahkan');
        }

        if($request->ajax()){
            $table_mapel = $this->renderNilaiMapelTable($jadwal->id_kelas, $jadwal->id_tahun_ajar);
            return response(['code' => 1, 'message' => 'Berhasil mengubah data jadwal', 'table' => $table_mapel]);
        }

        return redirect('jadwal')->with('success', 'Data jadwal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        try {
            $jadwal->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data jadwal']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data jadwal']);
    }
}
