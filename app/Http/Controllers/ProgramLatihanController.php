<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\ProgramLatihan;

class ProgramLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $program = ProgramLatihan::latest()->paginate(7);
        } else {
            $program = ProgramLatihan::where('user_id', auth()->user()->id)->latest()->paginate(7);
        }
        $search = request()->search;
        $programQuery = ProgramLatihan::with('anggota', 'user');
        if ($search) {
            $programQuery->where('title', 'like', '%' . $search . '%')
                ->orWhere('tanggal', 'like', '%' . $search . '%')
                ->orWhere('jam', 'like', '%' . $search . '%')
                ->orWhere('lokasi', 'like', '%' . $search . '%')
                ->orWhere('program', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%')
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama_lengkap', 'like', '%' . $search . '%');
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        }
        return view('program-latihan.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = ProgramLatihan::all();
        $anggota = Anggota::all();
        $user = User::all();
        return view('program-latihan.create', compact('program', 'anggota', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
            'program' => 'required',
            'keterangan' => 'required',
            'anggota_id' => 'required',
            'user_id' => 'required',
        ]);

        $user = User::find($request->user_id);
        $programLatihan = new ProgramLatihan($request->all());
        $user->programLatihan()->save($programLatihan);

        return redirect()->route('program-latihan.index')->with('success', 'Berhasil Menambahkan Data Program Latihan');
    }


    public function show(string $id)
    {
        $program = ProgramLatihan::find($id);
        return view('program-latihan.show', compact('program'));
    }


    public function edit(string $id)
    {
        $program = ProgramLatihan::find($id);
        $anggota = Anggota::all();
        $user = User::all();
        return view('program-latihan.edit', compact('program', 'anggota', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable',
            'tanggal' => 'nullable',
            'jam' => 'nullable',
            'lokasi' => 'nullable',
            'program' => 'nullable',
            'keterangan' => 'nullable',
            'anggota_id' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $programLatihan = ProgramLatihan::findOrFail($id);
        $programLatihan->update($request->all());

        return redirect()->route('program-latihan.index')->with('success', 'Berhasil Mengubah Data Program Latihan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = ProgramLatihan::find($id);
        $program->delete();
        return redirect()->route('program-latihan.index')->with('success', 'Berhasil Menghapus Data Program Latihan');
    }
}
