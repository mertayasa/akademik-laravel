<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{

    public function index()
    {
        if (FacadesRequest::is('*guru*')) {
            return view('guru.index');
        }
        if (FacadesRequest::is('*ortu*')) {
            return view('ortu.index');
        }
    }

    public function datatable($level)
    {

        if (FacadesRequest::is('*guru*')) {
            $guru = User::where('level', 'guru')->get();
            return UserDataTable::set($guru, 'guru');
        }
        if (FacadesRequest::is('*ortu*')) {
            $ortu = User::where('level', 'ortu')->get();
            return UserDataTable::set($ortu, 'ortu');
        }
    }

    public function create()
    {
        if (FacadesRequest::is('*guru*')) {
            return view('guru.create');
        }
        if (FacadesRequest::is('*ortu*')) {
            return view('ortu.create');
        }
    }

    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->nama = $request->nama;
            
            if (FacadesRequest::is('*guru*')) {
                $user->nip = $request->nip;
            } else if (FacadesRequest::is('*ortu*')) {
                $user->nip = 0;
            } else {
                throw new Exception('Error 500');
            }

            $user->alamat = $request->alamat;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_tlp = $request->no_tlp;
            $user->pekerjaan = $request->pekerjaan;
            
            if (FacadesRequest::is('*guru*')) {
                $user->status_guru = $request->status_guru;
            } else if (FacadesRequest::is('*ortu*')) {
                $user->status_guru = 'bukan_guru';
            } else {
                throw new Exception('Error 500');
            }

            if (FacadesRequest::is('*guru*')) {
                $user->level = 'guru';
            } else if (FacadesRequest::is('*ortu*')) {
                $user->level = 'ortu';
            } else {
                throw new Exception('Error 500');
            }

            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $user->foto = $upload_image;
            }

            $user->status = 'aktif';
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan ' . $this->getFeedback($user->level) . ' !');
        }

        return redirect()->route($this->getFeedback($user->level, 'english') . '.index')->with('success', 'Berhasil menambahkan data ' . $this->getFeedback($user->level));
    }


    public function edit(User $user)
    {
        if (FacadesRequest::is('*guru*')) {
            return view('guru.edit', compact('user'));
        }
        if (FacadesRequest::is('*ortu*')) {
            return view('ortu.edit', compact('user'));
        }
    }

    public function update(Request $request,   $id)
    {
        try {
            $user = User::find($id);
            $user->nama = $request->nama;

            if (FacadesRequest::is('*guru*')) {
                $user->nip = $request->nip;
            } else if (FacadesRequest::is('*ortu*')) {
                $user->nip = 0;
            } else {
                throw new Exception('Error 500');
            }

            $user->alamat = $request->alamat;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->no_tlp = $request->no_tlp;
            $user->pekerjaan = $request->pekerjaan;

            if (FacadesRequest::is('*guru*')) {
                $user->status_guru = $request->status_guru;
            } else if (FacadesRequest::is('*ortu*')) {
                $user->status_guru = 'bukan_guru';
            } else {
                throw new Exception('Error 500');
            }

            if (FacadesRequest::is('*guru*')) {
                $user->level = 'guru';
            } else if (FacadesRequest::is('*ortu*')) {
                $user->level = 'ortu';
            } else {
                throw new Exception('Error 500');
            }

            if($request['foto']){
                $base_64_foto = json_decode($request['foto'], true);
                $upload_image = uploadFile($base_64_foto, 'foto_profil');
                if ($upload_image === 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
                $user->foto = $upload_image;
            }
            
            $user->status = $request->status;
            $user->email = $request->email;
            if($request->password){
                $user->password = bcrypt($request->password);
            }

            $user->save();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah ' . $this->getFeedback($user->level) . ' !');
        }

        return redirect()->route($this->getFeedback($user->level, 'english') . '.index')->with('success', 'Berhasil mengubah data ' . $this->getFeedback($user->level));
    }

    public function show(User $user)
    {
        if (FacadesRequest::is('*guru*')) {
            return view('guru.show', compact('user'));
        }
        if (FacadesRequest::is('*ortu*')) {
            return view('ortu.show', compact('user'));
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus user']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus user']);
    }

    private function getFeedback($level, $lang = null)
    {
        if ($level == 'admin') {
            return 'admin';
        }

        if ($level == 'guru') {
            return 'guru';
        }

        if ($level == 'ortu') {
            if ($lang == 'english') {
                return 'ortu';
            }
            return 'ortu';
        }
    }

    public function editProfile(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(User $user, Request $request)
    {
        if (Auth::id() != $user->id) {
            abort(403);
        }

        try {
            $data = $request->all();
            $user->nama = $request->nama;
            if ($data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            unset($data['level']);

            $user->update($data);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah profil ' . $user->name);
        }

        return redirect()->back()->with('success', 'Berhasil mengubah profil ' . $user->name);
    }
}
