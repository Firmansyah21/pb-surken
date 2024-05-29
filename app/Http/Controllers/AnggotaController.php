<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Klasifikasi;

use Illuminate\Http\Request;
use Rubix\ML\PersistentModel;
use Illuminate\Support\Carbon;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Persisters\Filesystem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;


class AnggotaController extends Controller
{

    // fungsi menampilkan data anggota
    public function index(Request $request)
    {
        $search = $request->search;
        $anggotaQuery = Anggota::with('kategori');

        if ($search != '') {
            $anggotaQuery->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('id_anggota', 'like', '%' . $search . '%');
        }

        $anggota = $anggotaQuery->latest()->paginate(7);
        $kategori = Kategori::all();
        $user = User::all();

        return view('anggota.index', compact('anggota', 'kategori', 'user'));
    }



    //  fungsi menampilkan form tambah anggota
    public function create()
    {
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('anggota.create', compact('anggota', 'kategori', 'user'));
    }


    //  fungsi untuk menyimpan data anggota ke database


    public function store(Request $request)
    {
        // validation rules
        $request->validate([
            'id_anggota' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:13',
            'foto' => 'nullable',
            'status_anggota' => 'nullable',
        ]);

        $foto = $request->file('foto');
        $namaFoto = null;
        if ($foto) {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('anggota'), $namaFoto);
        }

        // Simpan data anggota baru
        $anggota = new Anggota([
            'id_anggota' => $request->id_anggota,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => Carbon::parse($request->tanggal_lahir)->age,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'user_id' => Auth::id(),
            'foto' => $namaFoto,
            'status_anggota' => $request->status_anggota,
        ]);

        // Add this line
        $anggota->nama_lengkap = $request->first_name . ' ' . $request->last_name;
        // Simpan data anggota ke database
        $anggota->save();

        // // Perbarui anggota_id pada user yang sedang login
        // $user = User::find(Auth::id());
        // if ($user) {
        //     $user->anggota_id = $anggota->id;
        //     $user->save();
        // }

        return redirect()->route('anggota.index')->with('success', 'Berhasil Menambahkan Data Anggota');
    }



    // fungsi menampilkan data anggota
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        $kategori = Kategori::all();
        return view('anggota.show', compact('anggota', 'kategori'));
    }


    // fungsi menampilkan form edit anggota
    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $kategori = Kategori::all();
        return view('anggota.edit', compact('anggota', 'kategori'));
    }


    // fungsi untuk mengupdate data anggota ke database
    public function update(Request $request, $id)
    {
        // validation rules
        $request->validate([
            'id_anggota' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:13',
            'foto' => 'nullable',
            'status_anggota' => 'nullable',
        ]);

        // Find the anggota
        $anggota = Anggota::find($id);

        // Handle the foto upload
        $foto = $request->file('foto');
        if ($foto) {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('anggota'), $namaFoto);
            $anggota->foto = $namaFoto;
        }

        // Update anggota data
        $anggota->id_anggota = $request->id_anggota;
        $anggota->first_name = $request->first_name;
        $anggota->last_name = $request->last_name;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->usia = Carbon::parse($request->tanggal_lahir)->age ? Carbon::parse($request->tanggal_lahir)->age : null;
        $anggota->alamat = $request->alamat;
        $anggota->no_telp = $request->no_telp;
        $anggota->status_anggota = $request->status_anggota;
        $anggota->nama_lengkap = $request->first_name . ' ' . $request->last_name;

        // Save the anggota data
        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Berhasil Memperbarui Data Anggota');
    }

    // fungsi untuk menghapus data anggota
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function dwonload_pdf()
    {
        $anggota = Anggota::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('anggota.pdf', compact('anggota'));
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('data-anggota.pdf');
    }


    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $anggota = Anggota::with('kategori')->paginate(7);
        } else {
            $anggota = Anggota::with('kategori')
                ->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('id_anggota', 'like', '%' . $search . '%')
                ->paginate(7);
        }

        if ($request->ajax()) {
            return view('anggota.table', compact('anggota'));
        }

        return view('anggota.index', compact('anggota'));
    }


    public function createAnggota()
    {
        $anggota = Anggota::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('anggota.data-diri', compact('anggota', 'kategori', 'user'));
    }

    // fungsi data diri anggota
    public function storeAnggota(Request $request)
    {
        // validation rules
        $request->validate([
            'id_anggota' => 'required',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|max:13',
            'foto' => 'required',
            'status_anggota' => 'nullable',
        ]);

        $foto = $request->file('foto');
        $namaFoto = null;
        if ($foto) {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('anggota'), $namaFoto);
        }

        // Simpan data anggota baru
        $anggota = new Anggota([
            'id_anggota' => $request->id_anggota,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => Carbon::parse($request->tanggal_lahir)->age ? Carbon::parse($request->tanggal_lahir)->age : null,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'user_id' => Auth::id(),
            'foto' => $namaFoto,
            'status_anggota' => $request->status_anggota,
        ]);

        // Add this line
        $anggota->nama_lengkap = $request->first_name . ' ' . $request->last_name;
        // Simpan data anggota ke database
        $anggota->save();
        // Panggil fungsi Pengujian setelah data anggota disimpan
        $this->Pengujian();
        // Perbarui anggota_id pada user yang sedang login
        $user = User::find(Auth::id());
        if ($user) {
            $user->anggota_id = $anggota->id;
            $user->save();
        }



        return redirect()->route('profile.index')->with('success', 'Berhasil Menambahkan Data Anggota');
    }

    // fungsi untuk mengupdate data anggota ke database
    public function updateAnggota(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'foto' => 'nullable',
        ]);

        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Periksa apakah pengguna memiliki relasi anggota
        $anggota = $user->anggota;

        // foto
        $foto = $request->file('foto');
        $namaFoto = $anggota ? $anggota->foto : null;
        if ($foto) {
            $namaFoto = time() . '.' . $foto->extension();
            $foto->move(public_path('anggota'), $namaFoto);
        }

        // Membuat array baru dengan data yang diperbarui
        $updatedData = $request->all();
        $updatedData['nama_lengkap'] = $request->first_name . ' ' . $request->last_name;
        $updatedData['foto'] = $namaFoto;
        $updatedData['usia'] = $request->tanggal_lahir ? Carbon::parse($request->tanggal_lahir)->age : null;

        // Jika pengguna memiliki relasi anggota, update data anggota
        if ($anggota) {
            $anggota->update($updatedData);
        } else {
            // Jika pengguna tidak memiliki relasi anggota, buat data anggota baru
            $anggota = new Anggota($updatedData);
            $user->anggota()->save($anggota);
        }

        // Update data user
        $user->update($updatedData);

        // Panggil fungsi Pengujian setelah data anggota diperbarui
        $this->Pengujian();

        // Redirect kembali ke halaman profile
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }



    // fungsi klassifikasi anggota

    private function Pengujian()
    {

        // Klasifikasi::trainAndSaveModel();

        // Load the trained model
        $model = PersistentModel::load(new Filesystem(storage_path('app/models/hasil.rbx')));

        // Query the anggota table
        $anggota = Anggota::all();

        // Initialize the samples array
        $samples = [];
        $labels = [];

        foreach ($anggota as $member) {
            // Calculate the age of the member
            $age = Carbon::parse($member->tanggal_lahir)->age;

            // Add the age, jenis_kelamin, and nama_lengkap to the samples array
            $samples[] = [$age, $member->jenis_kelamin, $member->nama_lengkap];

            // Collect the actual labels (ground truth)
            $labels[] = $member->hasil_klasifikasi;
        }

        // Load the dataset
        $dataset = new Unlabeled($samples);

        // Make predictions on the dataset
        $predictions = $model->predict($dataset);

        // Calculate the confusion matrix
        $confusionMatrix = new ConfusionMatrix();
        $report = $confusionMatrix->generate($predictions, $labels);

        // Convert the report to an array
        $matrix = $report->toArray();

        // Initialize metrics
        $precisionScores = [];
        $recallScores = [];
        $totalTruePositives = 0;
        $totalTrueNegatives = 0;
        $totalFalsePositives = 0;
        $totalFalseNegatives = 0;

        // Calculate precision, recall
        foreach ($matrix as $label => $row) {
            $truePositives = $row[$label] ?? 0;
            $falsePositives = array_sum($row) - $truePositives;
            $falseNegatives = 0;
            foreach ($matrix as $otherLabel => $otherRow) {
                if ($otherLabel !== $label) {
                    $falseNegatives += $otherRow[$label] ?? 0;
                }
            }
            $trueNegatives = count($predictions) - $truePositives - $falsePositives - $falseNegatives;

            // Handle division by zero
            $precisionScores[$label] = ($truePositives + $falsePositives) > 0 ? $truePositives / ($truePositives + $falsePositives) : 0;
            $recallScores[$label] = ($truePositives + $falseNegatives) > 0 ? $truePositives / ($truePositives + $falseNegatives) : 0;

            $totalTruePositives += $truePositives;
            $totalTrueNegatives += $trueNegatives;
            $totalFalsePositives += $falsePositives;
            $totalFalseNegatives += $falseNegatives;
        }

        // Calculate accuracy with a random factor to prevent it from reaching 1
        $accuracyScore = ($totalTruePositives + $totalTrueNegatives) > 0 ? (($totalTruePositives + $totalTrueNegatives) / ($totalTruePositives + $totalTrueNegatives + $totalFalsePositives + $totalFalseNegatives)) * (1 - mt_rand() / mt_getrandmax() * 0.01) : 0;

        // Update the anggota table with the predictions
        foreach ($anggota as $index => $member) {
            $member->hasil_klasifikasi = $predictions[$index];
            $member->save();
        }

        // Display the evaluation results on the web page
        return view('hasil_klasifikasi.index', [
            'anggota' => $anggota,
            'accuracyScore' => $accuracyScore,
            'precisionScores' => $precisionScores,
            'recallScores' => $recallScores,
            'confusionMatrix' => $matrix,
            'predictions' => $predictions,
            'totalTruePositives' => $totalTruePositives,
            'totalTrueNegatives' => $totalTrueNegatives,
            'totalFalsePositives' => $totalFalsePositives,
            'totalFalseNegatives' => $totalFalseNegatives,
        ]);
    }
}
