<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\AnggotaKelas;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\DataTables\SiswaDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_kelas = null)
    {
        // $siswa = Siswa::all();
        // $siswa = AnggotaKelas::with('siswa')->where('id_kelas', $id_kelas)->get();
        $siswa = $id_kelas;
        // dd($siswa);
        return view('siswa.index', compact('siswa'));
    }

    public function datatable($kelas = null)
    {
        $siswa = Siswa::all();
        $siswa = AnggotaKelas::with('siswa')->where('id_kelas', $kelas)->get();

        // $anggota_kelas = AnggotaKelas::with('siswa')->whereHas('siswa', function ($siswa) use ($id_kelas) {
        //     $siswa->where('id_kelas', $id_kelas == null ? 1 : $id_kelas);
        // })->get();
        return SiswaDataTable::set($siswa);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $user = User::where('level', 'ortu')->pluck('nama', 'id');
        return view('siswa.create', compact('user'));
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
            $siswa = new Siswa;
            $siswa->nama = $request->nama;
            $siswa->nis = $request->nis;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tgl_lahir = $request->tgl_lahir;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->id_user = $request->id_user;
            $siswa->status = 'aktif';

            // dd($siswa);
            $siswa->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data siswan Gagal Ditambahkan');
        }

        return redirect('siswa')->with('success', 'Data siswan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa, User $user)
    {
        return view('siswa.show', compact('siswa', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa, User $user)
    {
        $user = User::where('level', 'ortu')->pluck('nama', 'id');
        return view('siswa.edit', compact('siswa', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $update = Siswa::find($id);
            $update->nama = $request->nama;
            $update->nis = $request->nis;
            $update->email = $request->email;
            $update->alamat = $request->alamat;
            $update->tempat_lahir = $request->tempat_lahir;
            $update->tgl_lahir = $request->tgl_lahir;
            $update->jenis_kelamin = $request->jenis_kelamin;
            $update->id_user = $request->id_user;
            $update->status = $request->status;

            $update->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data siswa Gagal Di Edit');
        }

        return redirect('siswa')->with('info', 'Data siswa Berhasil Diedit ');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        try {
            $siswa->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data siswa']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data siswa']);
    }
}
