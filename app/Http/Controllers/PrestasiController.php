<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Prestasi;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrestasiController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $prestasi = Prestasi::latest()->paginate(7);
        } else {
            $prestasi = Prestasi::where('user_id', auth()->user()->id)->latest()->paginate(7);
        }
        $search = $request->search;
        $prestasiQuery = Prestasi::with('kategori', 'anggota');
        if ($search) {
            $prestasiQuery->where('title', 'like', '%' . $search . '%')
                ->orWhere('penyelenggara', 'like', '%' . $search . '%')
                ->orWhere('tingkat', 'like', '%' . $search . '%')
                ->orWhere('juara', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('anggota', function ($query) use ($search) {
                    $query->where('nama_lengkap', 'like', '%' . $search . '%');
                });
        }
        $prestasi = $prestasiQuery->latest()->paginate(7);
        return view('prestasi.index', compact('prestasi'));
    }



    public function create()
    {
        $prestasi = Prestasi::all();
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        $user = User::all();
        return view('prestasi.create', compact('prestasi', 'kategori', 'anggota', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'tanggal' => 'nullable',
            'penyelenggara' => 'nullable',
            'tingkat' => 'nullable',
            'juara' => 'nullable',
            'kategori_id' => 'nullable',
            'anggota_id' => 'nullable',
            'image' => 'nullable',
        ]);

        $foto = $request->file('image');
        $namaFoto = time() . '.' . $foto->extension();
        $foto->move(public_path('prestasi'), $namaFoto);

        $user = User::find($request->user_id);
        $prestasi = new Prestasi($request->all());
        $prestasi->image = $namaFoto; // Set the image name
        $user->prestasi()->save($prestasi);

        return redirect()->route('prestasi.index')->with('success', 'Data Berhasil Ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        return view('prestasi.show', compact('prestasi', 'anggota', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        return view('prestasi.edit', compact('prestasi', 'kategori', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable',
            'tanggal' => 'nullable',
            'penyelenggara' => 'nullable',
            'tingkat' => 'nullable',
            'juara' => 'nullable',
            'kategori_id' => 'nullable',
            'anggota_id' => 'nullable',
            'image' => 'nullable',
        ]);

        $prestasi = Prestasi::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('prestasi'), $imageName);
            $prestasi->image = $imageName; // Adjust column name if needed
        }

        $prestasi->update($request->except('image'));

        return redirect()->route('prestasi.index')->with('success', 'Data Berhasil Diubah.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function dwonload_pdf()
    {
        if (auth()->user()->role === 'admin') {
            // Jika role adalah admin, ambil semua data prestasi
            $prestasi = Prestasi::all();
        } else {
            // Jika role adalah user, ambil data prestasi yang sesuai dengan user_id
            $prestasi = Prestasi::where('user_id', auth()->id())->get();
        }

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('prestasi.pdf', compact('prestasi'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data-prestasi.pdf');
    }
}
