<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Footer;
use App\Models\Anggota;
use App\Models\Gallery;
use App\Models\Pelatih;
use App\Models\Kategori;
use App\Models\Prestasi;
use App\Models\Pendaftaran;
use App\Models\SectionHero;
use App\Models\SectionAbout;
use Illuminate\Http\Request;
use App\Models\JadwalLatihan;
use App\Models\AgendaPertandingan;
use Illuminate\Support\Facades\Redis;

class FrontendController extends Controller
{

    //  funsgi menampilkan halaman home
    public function index()
    {
        $post = Post::latest()->take(3)->get();
        $anggota = Anggota::latest()->take(4)->get();
        $galeri = Gallery::latest()->take(4)->get();
        $kategori = Kategori::all();

        return view('FE.home', compact('post', 'kategori', 'anggota', 'galeri',));
    }

    //  fungsi menampilkan data anggota
    public function anggota()
    {
        $anggota = Anggota::latest()->paginate(8);
        $kategori = Kategori::all();
        return view('FE.data-anggota', compact('kategori', 'anggota'));
    }




    public function detailanggota($slug)
    {
        $anggota = Anggota::where('slug', $slug)->first();
        $kategori = Kategori::all();
        $prestasi = $anggota->prestasi ?? [];


        return view('FE.detail-anggota', compact('anggota', 'kategori', 'prestasi'));
    }



    //  fungsi menampilkan latest blog
    public function latestblog()
    {
        $post = Post::latest()->take(3)->get();
        $kategori = Kategori::all();
        return view('FE.home', compact('post', 'kategori'));
    }

    //  fungsi menampilkan blog
    public function blog()
    {
        $post = Post::latest()->get();
        $kategori = Kategori::all();

        return view('FE.blog', compact('post', 'kategori'));
    }


    //  fungsi menampilkan detail blog
    public function detailblog($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $kategori = Kategori::all();

        // Get the 5 most recent posts, excluding the current post
        $recent = Post::where('id', '!=', $post->id)->orderBy('created_at', 'desc')->take(5)->get();
        return view('FE.detail-blog', compact('post', 'kategori', 'recent'));
    }



    //  fungsi menampilkan data pelatih
    public function pelatih()
    {
        $pelatih = Pelatih::latest()->paginate(8);
        return view('FE.pelatih', compact('pelatih'));
    }

    public function detailpelatih($slug)
    {
        $pelatih = Pelatih::where('slug', $slug)->first();
        return view('FE.detail-pelatih', compact('pelatih'));
    }

    //  fungsi menampilkan about
    public function about()
    {

        return view('FE.about');
    }

    //  fungsi menampilkan gallery
    public function gallery()
    {

        $galeri = Gallery::latest()->get();
        return view('FE.gallery', compact('galeri'));
    }


    //  fungsi menampilkan contact
    public function contact()
    {

        return view('FE.contact');
    }

    //  fungsi menampilkan form pendaftaran


    //  fungsi menampilkan turnamen
    public function agenda()
    {
        $agenda = AgendaPertandingan::all();
        return view('FE.agenda', compact('agenda'));
    }

    //  fungsi menampilkan latihan
    public function latihan()
    {
        $jadwal = JadwalLatihan::all();
        return view('FE.latihan', compact('jadwal'));
    }



    //  fungsi menampilkan prestasi
    public function prestasi()
    {
        $prestasi = Prestasi::all();
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        return view('FE.prestasi', compact('kategori', 'anggota', 'prestasi'));
    }

    public function footer()
    {
        $footer = Footer::first();
        return view('layouts.main', compact('footer'));
    }




    public function indexPendaftaran()
    {
        $pendaftaran = Pendaftaran::all();
        $kategori = Kategori::all();
        return view('FE.form-daftar', compact('pendaftaran', 'kategori'));
    }

    // pendaftaran anggota baru
    public function storePendaftaran(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'akte' => 'required|file',
            'ijazah' => 'required|file',
            'foto' => 'required|file',
        ]);

        $foto = $request->file('foto');
        $akte = $request->file('akte');
        $ijazah = $request->file('ijazah');

        $timestamp = time();
        $directory = "data-pendaftaran/{$timestamp}";

        $namaFoto = $foto ? $timestamp . '_foto.' . $foto->extension() : null;
        $namaAkte = $akte ? $timestamp . '_akte.' . $akte->extension() : null;
        $namaIjazah = $ijazah ? $timestamp . '_ijazah.' . $ijazah->extension() : null;

        if ($foto) {
            $foto->move(public_path($directory), $namaFoto);
        }

        if ($akte) {
            $akte->move(public_path($directory), $namaAkte);
        }

        if ($ijazah) {
            $ijazah->move(public_path($directory), $namaIjazah);
        }

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'akte' => $directory . '/' . $namaAkte,
            'ijazah' => $directory . '/' . $namaIjazah,
            'foto' => $directory . '/' . $namaFoto
        ]);

        return redirect()->route('form-pendaftaran')->with('success', 'Berhasil Mendaftar');
    }
}
