<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Jadwal;
use App\Models\AnggotaKelas;
use Illuminate\Http\Request;
use App\DataTables\NilaiDataTable;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_anggota_kelas = $request->get('id_anggota_kelas');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->where('siswa.id_user', Auth::id())->pluck('siswa.nama', 'id');
        // dd($anggota_kelas);
        $nilai = nilai::all();

        $data  =  [
            'id_anggota_kelas' => $id_anggota_kelas,
            'anggota_kelas' => $anggota_kelas,
            'nilai' => $nilai
        ];

        return view('nilai.index', $data);
    }

    public function datatable()
    {
        // Log::info($approval_status);
        $nilai = Nilai::all();
        return NilaiDataTable::set($nilai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::where('status', 'aktif')->pluck('id');
        return view('nilai.create', compact('jadwal', 'anggota_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Nilai::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilain Gagal Ditambahkan');
        }

        return redirect('nilai')->with('success', 'Data nilain Berhasil Ditambahkan');
    }

    public function storeMapel(Request $request, $id_kelas, $id_tahun_ajar)
    {
        try{
            $anggota_kelas_raw = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
            $anggota_kelas = $anggota_kelas_raw->get();

            DB::transaction(function() use($anggota_kelas, $request){
                foreach($anggota_kelas as $anggota){
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'ganjil',
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'ganjil',
                    ]);
                }
        
                foreach($anggota_kelas as $anggota){
                    Nilai::updateOrCreate([
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'genap',
                    ],[
                        'id_anggota_kelas' => $anggota->id,
                        'id_mapel' => $request->id_mapel,
                        'semester' => 'genap',
                    ]);
                }
            }, 5);

            $table = $this->renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas_raw);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menambahkan mata pelajaran yang dinilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menambahkan mata pelajaran yang dinilai', 'table' => $table]);
    }

    public function destroyMapel($id_kelas, $id_tahun_ajar, $id_mapel)
    {
        $anggota_kelas = AnggotaKelas::byKelasAndTahun($id_kelas, $id_tahun_ajar);
        $nilai_by_anggota = Nilai::whereIn('id_anggota_kelas', $anggota_kelas->pluck('id')->toArray())->where('id_mapel', $id_mapel)->get();
        try{
            DB::transaction(function () use($nilai_by_anggota){
                foreach($nilai_by_anggota as $nilai){
                    $nilai->delete();
                }
            });
            $table = $this->renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data mata pelajaran yang dinilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data mata pelajaran yang dinilai', 'table' => $table]);
    }

    private function renderNilaiMapelTable($id_kelas, $id_tahun_ajar, $anggota_kelas_raw)
    {
        $mapel_of_nilai = Nilai::getUniqueMapel(Nilai::query(), $anggota_kelas_raw->pluck('id')->toArray());
        $data = [
            'id_kelas' => $id_kelas,
            'id_tahun_ajar' => $id_tahun_ajar,
            'mapel_of_nilai' => $mapel_of_nilai
        ];

        return view('nilai.table_mapel', $data)->render();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $jadwal = Jadwal::pluck('id');
        $anggota_kelas = AnggotaKelas::with('siswa')->get()->pluck('siswa.nama', 'id');
        return view('nilai.edit', compact('jadwal', 'nilai', 'anggota_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        try {
            $nilai->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data nilai Gagal Di Edit');
        }

        return redirect('nilai')->with('info', 'Data nilai Berhasil Diedit  ');
    }

    public function updateRaport(Request $request, AnggotaKelas $anggota_kelas)
    {
        return response([$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        try {
            $nilai->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data nilai']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data nilai']);
    }
}
