<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgendaPertandingan;
use Illuminate\Routing\Controller;


class AgendaPertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $agenda = AgendaPertandingan::query();
        if ($search != '') {
            $agenda->where('title', 'like', '%' . $search . '%');
        }
        $agenda = $agenda->paginate(7);
        return view('agenda.index', compact('agenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agenda = AgendaPertandingan::all();
        return view('agenda.create', compact('agenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'title' => 'nullable',
            'tanggal_mulai' => 'nullable',
            'tanggal_berakhir' => 'nullable',
            'jam' => 'nullable',
            'lokasi' => 'nullable',
            'keterangan' => 'nullable',
            'foto' => 'nullable',
        ]);
        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('agenda'), $imageName);

        AgendaPertandingan::create([
            'title' => $request->title,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'foto' => $imageName
        ]);

        return redirect()->route('agenda.index')->with('success', 'Berhasil Menambahkan Data Agenda Pertandingan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agenda = AgendaPertandingan::find($id);
        return view('agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agenda = AgendaPertandingan::find($id);
        return view('agenda.edit', compact('agenda'));
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
            'keterangan' => 'nullable',
            'foto' => 'nullable',
        ]);

        $agenda = AgendaPertandingan::findOrFail($id);

        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('agenda'), $namaFoto);
            $agenda->foto = $namaFoto;
        }

        $agenda->update([
            'title' => $request->title,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('agenda.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agenda = AgendaPertandingan::findOrFail($id);
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Data Berhasil Dihapus');
    }



    // fungsi untuk menampilkan data agenda pertandingan menggunakan json api
    public function showCalendar()
    {
        $events = AgendaPertandingan::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->tanggal_mulai,
                'end' => $event->tanggal_berakhir,
                'jam' => $event->jam,
                'description' => $event->keterangan,
                'location' => $event->lokasi,
            ];
        });

        return response()->json($events);
    }
    // end fungsi



}
