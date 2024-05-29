<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $search = $request->search;
        $pelatih = Pelatih::query();

        if ($search != '') {
            $pelatih->where('nama_lengkap', 'like', '%' . $search . '%');
        }

        $pelatih = $pelatih->paginate(7);
        return view('pelatih.index', compact('pelatih'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelatih = Pelatih::all();
        return view('pelatih.create', compact('pelatih'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'foto' => 'required',
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '.' . $foto->extension();
        $foto->move(public_path('pelatih'), $namaFoto);

        Pelatih::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto' => $namaFoto,
            'nama_lengkap' => $request->first_name . ' ' . $request->last_name,
        ]);



        return redirect()->route('pelatih.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelatih = Pelatih::findOrFail($id);
        return view('pelatih.show', compact('pelatih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelatih = Pelatih::findOrFail($id);
        return view('pelatih.edit', compact('pelatih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_telp' => 'nullable',
            'email' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $pelatih = Pelatih::findOrFail($id);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('pelatih'), $imageName);
            $pelatih->foto = $imageName; // Adjust column name if needed
        }

        $pelatih->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            // 'foto' => $request->foto, // Remove this line if 'foto' column is already updated
        ]);

        return redirect()->route('pelatih.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelatih::findOrFail($id)->delete();
        return redirect()->route('pelatih.index')->with('success', 'Data berhasil dihapus');
    }

    public function dwonload_pdf()
    {
        $pelatih = Pelatih::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pelatih.pdf', compact('pelatih'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data-pelatih.pdf');
    }
}
