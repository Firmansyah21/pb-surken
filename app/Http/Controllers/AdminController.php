<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Pelatih;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function card()
    {
        // Menghitung jumlah anggota
        $jumlahAnggota = Anggota::count();
        // Menghitung jumlah pelatih
        $jumlahPelatih = Pelatih::count();
        // Menghitung jumlah user
        $jumlahUser = User::count();

        $jumlahAnggotaLakiLaki = Anggota::where('jenis_kelamin', 'Laki-laki')->count();
        $jumlahAnggotaPerempuan = Anggota::where('jenis_kelamin', 'Perempuan')->count();

        // Mengambil data jumlah anggota per bulan
        $members = Anggota::select(
            DB::raw("COUNT(*) as count"), // Menghitung jumlah anggota
            DB::raw("MONTH(created_at) as month") // Mengambil bulan dari tanggal dibuat
        )
            ->groupBy('month') // Mengelompokkan data berdasarkan bulan
            ->get(); // Mengambil data
        // Menghitung setiap hasil klasifikasi
        $hasilKlasifikasiCounts = Anggota::select('hasil_klasifikasi', DB::raw('COUNT(*) as count'))
            ->groupBy('hasil_klasifikasi')
            ->get();
        // Mengonversi hasil query ke format array untuk digunakan oleh Chart.js
        $labels = $hasilKlasifikasiCounts->pluck('hasil_klasifikasi');
        $counts = $hasilKlasifikasiCounts->pluck('count');

        // Mengembalikan view dashboard dengan data jumlah anggota, pelatih, dan user
        return view('dashboard', compact('jumlahAnggota', 'jumlahPelatih', 'jumlahUser', 'jumlahAnggotaLakiLaki', 'jumlahAnggotaPerempuan', 'members', 'hasilKlasifikasiCounts', 'labels', 'counts'));
    }
}
