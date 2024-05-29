<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;
        $userQuery = User::query();
        if ($search != '') {
            $userQuery->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
        $user = $userQuery->latest()->paginate(7);
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        $roles = Role::all()->pluck('name'); // Get all role names
        return view('user.index', compact('user', 'kategori', 'anggota', 'roles'));
    }

    /**
     * Show the form for creating a naew resource.
     */


    public function create()
    {
        $user = User::all();
        $kategori = Kategori::all();
        $anggota = Anggota::all();
        $roles = Role::all(); // Get all roles
        return view('user.create', compact('user', 'kategori', 'anggota', 'roles')); // Send roles to view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi.',
            'email' => ':attribute harus berupa alamat email yang valid.',
            'min' => ':attribute harus minimal :min karakter.',
            'unique' => ':attribute sudah terdaftar.',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ], $messages);

        $request['password'] = bcrypt($request['password']);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request['password'],
        ]);

        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat.');
    }



    public function show(string $id)
    {
        $user = User::with('anggota')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Get all roles
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'User dan anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }


    public function dwonload_pdf()
    {
        $user = User::with('roles')->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('user.pdf', compact('user'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data-user.pdf');
    }
}
