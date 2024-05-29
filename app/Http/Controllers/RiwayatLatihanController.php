<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\RiwayatLatihan;

class RiwayatLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Fitur pencarian
        $search = request()->search;
        $riwayat = RiwayatLatihan::query();
        if ($search) {
            $riwayat->where('tanggal', 'like', '%' . $search . '%')
                ->orWhere('jam', 'like', '%' . $search . '%')
                ->orWhere('lokasi', 'like', '%' . $search . '%');
        }

        // filter berdasarkan pengguna yang saat ini masuk
        $riwayat->where('user_id', auth()->user()->id);

        $riwayat = $riwayat->latest()->paginate(7);

        // Mengambil semua riwayat latihan
        $riwayatLatihan = RiwayatLatihan::where('user_id', auth()->id())->get();

        $totalMenit = 0;

        foreach ($riwayatLatihan as $latihan) {
            // Memisahkan jam dan menit
            $parts = explode(' ', $latihan->durasi_latihan);

            // Mengubah jam menjadi menit dan menambahkannya ke total
            $totalMenit += $parts[0] * 60;

            // Menambahkan menit ke total
            if (isset($parts[2])) {
                $totalMenit += $parts[2];
            }
        }

        // Mengubah total menit kembali ke format jam dan menit
        $jam = floor($totalMenit / 60);
        $menit = $totalMenit % 60;

        $totalDurasi = $jam . ' jam ' . $menit . ' menit';




        $absensi = Absensi::where('status', 'Hadir')->count();

        // Mengambil data absensi berdasarkan pengguna yang saat ini masuk
        $absensi = Absensi::where('user_id', auth()->user()->id)->get();

        // Menghitung jumlah kehadiran
        $jumlahHadir = $absensi->where('status', 'hadir')->count();

        // Menghitung jumlah ketidakhadiran
        $jumlahTidakHadir = $absensi->where('status', '!=', 'hadir')->count();

        return view('riwayat-latihan.index', compact('riwayat', 'absensi', 'totalDurasi', 'jumlahHadir', 'jumlahTidakHadir'));
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
        //
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
