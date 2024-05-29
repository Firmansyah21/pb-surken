<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->search;
        $galeri = Gallery::query();

        if ($search != '') {
            $galeri->where('title', 'like', '%' . $search . '%');
        }

        $galeri = $galeri->paginate(7);
        return view('gallery.index', compact('galeri'));
    }


    public function create()
    {
        $galeri = Gallery::all();
        return view('gallery.create', compact('galeri'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title.*' => 'nullable',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg|max:6048',
        ]);

        if ($request->has('title') && $request->has('foto') && is_array($request->title) && is_array($request->foto)) {
            for ($i = 0; $i < count($request->title); $i++) {
                if (isset($request->foto[$i])) {  // Pastikan bahwa $request->foto[$i] ada
                    $imageName = time() . '_' . $i . '.' . $request->foto[$i]->extension();
                    $request->foto[$i]->move(public_path('Gallery'), $imageName);
                    Gallery::create([
                        'title' => $request->title[$i] ?? '',  // Jika title tidak ada, berikan string kosong
                        'foto' => $imageName
                    ]);
                }
            }
        }

        return redirect()->route('gallery.index')->with('success', 'Berhasil Menambahkan Data Gallery');
    }




    public function show(string $id)
    {
        $galeri = Gallery::findOrFail($id);
        return response()->json($galeri);
    }


    public function edit(string $id)
    {
        $galeri = Gallery::findOrFail($id);
        return view('gallery.edit', compact('galeri'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable',
            'foto' => 'nullable',
        ]);

        $gallery = Gallery::whereId($id)->first();

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('Gallery'), $imageName);
            $gallery->foto = $imageName;
        }

        $gallery->title = $request->title;
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Data Berhasil Diupdate.');
    }


    public function destroy(string $id)
    {
        $galeri = Gallery::findOrFail($id);
        $galeri->delete();
        return redirect()->route('gallery.index')->with('success', 'Data Berhasil Dihapus.');
    }
}
