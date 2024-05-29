<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Kategori::latest()->paginate(7);

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategoris',
            'usia' => 'required'
        ]);

        Kategori::create([
            'name' => $request->name,
            'usia' => $request->usia
        ]);



        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $kategori = Kategori::findOrFail($id);
        return response()->json(['kategori' => $kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'name' => 'nullable',
            'usia' => 'nullable'
        ]);

        $kategori->update([
            'name' => $request->name,
            'usia' => $request->usia
        ]);

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus');
    }


    public function view_pdf()
    {
        $kategori = Kategori::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('kategori.pdf', compact('kategori'));
        return $pdf->download('kategori.pdf');
    }
}
