<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $pendaftaran = Pendaftaran::query();
        if ($search != '') {
            $pendaftaran->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%')
                ->orWhere('jenis_kelamin', 'like', '%' . $search . '%')
                ->orWhere('tempat_lahir', 'like', '%' . $search . '%')
                ->orWhere('tanggal_lahir', 'like', '%' . $search . '%')
                ->orWhere('no_telp', 'like', '%' . $search . '%');
        }
        $pendaftaran = $pendaftaran->paginate(7);
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.create', compact('daftar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'akte' => 'required',
            'ijazah' => 'required',
            'foto' => 'required',
        ]);
        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('data-pendaftaran'), $imageName);

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'akte' => $imageName,
            'ijazah' => $imageName,
            'foto' => $imageName
        ]);

        return redirect()->route('pendaftaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.show', compact('pendaftaran'));
    }



    public function dwonload_pdf()
    {
        $pendaftaran = Pendaftaran::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pendaftaran.pdf', compact('pendaftaran'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data-pendaftaran.pdf');
    }
}
