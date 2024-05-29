<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\RiwayatLatihan;
use Illuminate\Support\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $search = $request->search;
        $absensi = Absensi::query();

        // Menambahkan filter berdasarkan pengguna yang saat ini masuk
        $absensi->where('user_id', auth()->user()->id);

        if ($search != '') {
            $absensi->where('tanggal', 'like', '%' . $search . '%')
                ->orWhere('jam_masuk', 'like', '%' . $search . '%')
                ->orWhere('jam_keluar', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
        }

        $absensi = $absensi->latest()->paginate(7);
        return view('absensi.index', compact('absensi'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $absensi = Absensi::all();
        $anggota = Anggota::all();
        $riwayat_latihan = RiwayatLatihan::all();
        return view('absensi.create', compact('absensi', 'anggota', 'riwayat_latihan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jam_masuk' => 'nullable',
            'keterangan' => 'nullable',
            'foto' => 'nullable',
            'status' => 'required',
        ]);

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('absensi'), $imageName);

        // Tambahkan absensi
        Absensi::create([
            'user_id' => auth()->user()->id,
            'anggota_id' => auth()->user()->anggota_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'keterangan' => $request->keterangan,
            'foto' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Berhasil Menambah Data Absensi.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absensi = Absensi::findOrFail($id);
        $anggota = Anggota::all();
        return view('absensi.edit', compact('absensi', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jam_keluar' => 'required',
        ]);

        // Perbarui absensi
        $absensi = Absensi::find($id);
        $absensi->jam_keluar = $request->jam_keluar;
        $absensi->save();

        // Tambahkan riwayat latihan
        $interval = Carbon::parse($absensi->jam_masuk)->diff(Carbon::parse($absensi->jam_keluar));
        $durasi_latihan = $interval->format('%h jam %i menit');

        RiwayatLatihan::create([
            'anggota_id' => $absensi->anggota_id,
            'user_id' => $absensi->user_id,
            'tanggal' => $absensi->tanggal,
            'durasi_latihan' => $durasi_latihan,
            'keterangan' => $absensi->keterangan,
        ]);

        return redirect()->route('absensi.index')->with('success', 'Berhasil Memperbarui Data Absensi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Absensi::destroy($id);
        return redirect()->route('absensi.index')->with('success', 'Berhasil Menghapus Data Absensi.');
    }
}
