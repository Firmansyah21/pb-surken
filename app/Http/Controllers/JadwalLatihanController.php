<?php

namespace App\Http\Controllers;


use App\Models\Pelatih;
use Illuminate\Http\Request;
use App\Models\JadwalLatihan;
use Yajra\DataTables\Facades\DataTables;

class JadwalLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $seaarch = $request->search;
        $jadwal = JadwalLatihan::query();
        if ($seaarch != '') {
            $jadwal->where('hari', 'like', '%' . $seaarch . '%')
                ->orWhere('jam', 'like', '%' . $seaarch . '%')
                ->orWhere('tanggal', 'like', '%' . $seaarch . '%')
                ->orWhere('lokasi', 'like', '%' . $seaarch . '%');
        }
        $jadwal = $jadwal->paginate(7);

        return view('jadwal-latihan.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = JadwalLatihan::all();
        $pelatih = Pelatih::all();
        return view('jadwal-latihan.create', compact('jadwal', 'pelatih'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'nullable',
            'jam' => 'nullable',
            'tanggal' => 'nullable',
            'lokasi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '.' . $foto->extension();
        $foto->move(public_path('jadwal-latihan'), $namaFoto);

        JadwalLatihan::create([
            'hari' => $request->hari,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'foto' => $namaFoto,
        ]);

        return redirect()->route('jadwal-latihan.index')->with('success', "Berhasil menambahkan jadwal latihan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal_latihan = JadwalLatihan::findOrFail($id);
        return view('jadwal-latihan.show', compact('jadwal_latihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = JadwalLatihan::findOrFail($id);

        return view('jadwal-latihan.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hari' => 'nullable',
            'jam' => 'nullable',
            'tanggal' => 'nullable',
            'lokasi' => 'nullable',
            'foto' => 'nullable',
        ]);

        $jadwal = JadwalLatihan::findOrFail($id);
        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('jadwal-latihan'), $namaFoto);
            $jadwal->foto = $namaFoto;
        }

        $jadwal->update([
            'hari' => $request->hari,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('jadwal-latihan.index')->with('success', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = JadwalLatihan::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal-latihan.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
