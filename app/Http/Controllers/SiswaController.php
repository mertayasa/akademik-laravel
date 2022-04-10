<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\AnggotaKelas;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\DataTables\SiswaDataTable;
use App\Http\Requests\SiswaRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index');
    }

    public function indexOrtu()
    {
        return view('siswa.index');
    }

    public function datatableOrtu()
    {
        $id_ortu = Auth::id();
        $siswa = Siswa::where('id_user', $id_ortu);
        if(Auth::user()->isOrtu()){
            $siswa->where('status', 'aktif');
        }

        $siswa->get();

        return SiswaDataTable::set($siswa, $custom_action = 'siswa.datatable_action_guru');
    }

    public function datatable($kelas = null)
    {
        $siswa = Siswa::all();

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
    public function store(SiswaRequest $request)
    {
        try {
            $data = $request->validated();
            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $data['foto'] = $upload_image;
            }else{
                $data['foto'] = 'default/default_profil.png';
            }

            Siswa::create($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data siswa Gagal Ditambahkan');
        }

        return redirect('siswa')->with('success', 'Data siswa Berhasil Ditambahkan');
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
    public function update(SiswaRequest $request, Siswa $siswa)
    {
        try {
            $data = $request->validated();
            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $data['foto'] = $upload_image;
            }

            $siswa->update($data);
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
