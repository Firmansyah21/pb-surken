<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Riwayat;
use App\Models\HasilLatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasilLatihan = HasilLatihan::all();
        $anggota = Anggota::all();
        $riwayat_latihan = Riwayat::all();
        return view('hasil-latihan.index', compact('hasilLatihan', 'anggota', 'riwayat_latihan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */





    public function store(Request $request)
    {
        $request->validate([
            'lawan_id' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'skor_anggota' => 'required',
            'skor_lawan' => 'required',
        ]);

        // Mengambil user_id dari pengguna saat ini
        $userId = Auth::id();

        // Mencari anggota dengan user_id yang sama
        $anggota = Anggota::where('user_id', $userId)->first();

        // Jika anggota tidak ditemukan, kembalikan error
        if (!$anggota) {
            return redirect()->route('hasil-latihan.index')->with('error', 'Anggota tidak ditemukan');
        }

        // Menambahkan anggota_id ke request
        $request->merge(['anggota_id' => $anggota->id]);

        $hasilLatihan = HasilLatihan::create($request->all());

        // Mencari anggota dengan id yang sama dengan lawan_id
        $lawan = Anggota::find($hasilLatihan->lawan_id);

        // Jika lawan tidak ditemukan, kembalikan error
        if (!$lawan) {
            return redirect()->route('hasil-latihan.index')->with('error', 'Lawan tidak ditemukan');
        }

        // Menentukan status berdasarkan skor
        $status = $hasilLatihan->skor_anggota > $hasilLatihan->skor_lawan ? 'Menang' : 'Kalah';

        // Membuat instance dari model Riwayat
        $riwayat = new Riwayat();
        $riwayat->anggota_id = $hasilLatihan->anggota_id;
        $riwayat->tanggal = $hasilLatihan->tanggal;
        $riwayat->lokasi = $hasilLatihan->lokasi;
        $riwayat->lawan = $lawan->nama_lengkap; // Menggunakan nama_lengkap dari lawan
        $riwayat->skor = $hasilLatihan->skor_anggota . " - " . $hasilLatihan->skor_lawan; // Asumsi format skor adalah "skor_anggota - skor_lawan"
        $riwayat->status = $status; // Menggunakan status yang telah ditentukan

        // Menyimpan data ke dalam Riwayat
        $riwayat->save();

        return redirect()->route('riwayat')->with('success', 'Berhasil Menambahkan Hasil Latihan');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
