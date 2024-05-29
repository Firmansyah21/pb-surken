<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login beserta relasi anggotanya
        $user = Auth::user();

        // Periksa apakah pengguna memiliki relasi anggota
        if ($user->anggota) {
            $anggota = $user->anggota;
            return view('profile.index', compact('user', 'anggota'));
        } else {
            // Jika pengguna tidak memiliki relasi anggota
            return view('profile.index', compact('user'));
        }
    }




    public function update(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'foto' => 'nullable',
        ]);

        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Periksa apakah pengguna memiliki relasi anggota
        $anggota = $user->anggota;

        // foto
        $foto = $request->file('foto');
        $namaFoto = $anggota ? $anggota->foto : null;
        if ($foto) {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('anggota'), $namaFoto);
        }

        // Membuat array baru dengan data yang diperbarui
        $updatedData = $request->all();
        $updatedData['nama_lengkap'] = $request->first_name . ' ' . $request->last_name;
        $updatedData['foto'] = $namaFoto;
        $updatedData['usia'] = $request->tanggal_lahir ? Carbon::parse($request->tanggal_lahir)->age : null;

        // Jika pengguna memiliki relasi anggota, update data anggota
        if ($anggota) {
            $anggota->update($updatedData);
        } else {
            // Jika pengguna tidak memiliki relasi anggota, buat data anggota baru
            $anggota = new Anggota($updatedData);
            $user->anggota()->save($anggota);
        }

        // Update data user
        $user->update($updatedData);

        // Redirect kembali ke halaman profile
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }



    public function updatePassword(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Update password user
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        // Redirect kembali ke halaman profile
        return redirect()->route('profile.index')->with('success', 'Password berhasil diperbarui');
    }


    public function akun()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        return view('profile.akun', compact('user'));
    }

    public function updateAkun()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Validasi data yang dikirim
        request()->validate([
            'name' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed',

        ]);

        // Update data user
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password') ? bcrypt(request('password')) : $user->password,
        ]);

        // Redirect kembali ke halaman profile
        return redirect()->route('akun')->with('success', 'Akun berhasil diperbarui');
    }
}
