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
use App\Http\Requests\JadwalReq;
use App\Models\AnggotaKelas;
use App\Models\Nilai;
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
        return view('jadwal.index_guru');
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
    public function store(JadwalReq $request)
    {
        try {
            $data = $request->all();
            $data['kode_hari'] = getDayCode($request->hari);
            DB::transaction(function() use($data) {
                Jadwal::create($data);
                $anggota_kelas = AnggotaKelas::where('id_kelas', $data['id_kelas'])->where('id_tahun_ajar', $data['id_tahun_ajar'])->get();
                foreach($anggota_kelas as $anggota){
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                        'semester' => 'ganjil'
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                    ]);

                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                        'semester' => 'genap'
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                    ]);
                }
                
            }, 5);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            if($request->ajax()){
                return response(['code' => 0, 'message' => 'Gagal menambahkan data jadwal']);
            }
            return redirect()->back()->withInput()->with('error', 'Data jadwaln Gagal Ditambahkan');
        }

        if($request->ajax()){
            return response(['code' => 1, 'message' => 'Berhasil menambahkan data jadwal']);
        }

        return redirect('jadwal')->with('success', 'Data jadwal Berhasil Ditambahkan');
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
    public function update(JadwalReq $request, Jadwal $jadwal)
    {
        try {
            $data = $request->all();
            $data['kode_hari'] = getDayCode($request->hari);
            DB::transaction(function() use($data, $request, $jadwal) {
                $anggota_kelas = AnggotaKelas::where('id_kelas', $data['id_kelas'])->where('id_tahun_ajar', $data['id_tahun_ajar'])->get();
                foreach($anggota_kelas as $anggota){
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                        'semester' => 'ganjil'
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                    ]);

                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                        'semester' => 'genap'
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $data['id_mapel'],
                    ]);
                }

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
            return response(['code' => 1, 'message' => 'Berhasil mengubah data jadwal']);
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
