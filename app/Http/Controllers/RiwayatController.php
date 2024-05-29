<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{



    public function index()
    {
        $user_id = Auth::id(); // get the id of the authenticated user

        // fetch the riwayat data that belongs to the authenticated user
        $riwayat = Riwayat::whereHas('anggota', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->latest()->paginate(10);

        return view('riwayat.index', compact('riwayat'));
    }




    public function chartRiwayat()
    {
        $user_id = Auth::id(); // get the id of the authenticated user

        // fetch the riwayat data that belongs to the authenticated user
        $menang = Riwayat::whereHas('anggota', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->where('status', 'menang')->count();

        $kalah = Riwayat::whereHas('anggota', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->where('status', 'kalah')->count();

        return view('statistik.index', compact('menang', 'kalah'));
    }


    public function dwonload_pdf()
    {
        $riwayat = Riwayat::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('riwayat_latihan.pdf', compact('riwayat'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('riwayat-latihan.pdf');
    }
}
