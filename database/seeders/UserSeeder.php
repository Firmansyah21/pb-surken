<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PhpParser\Node\Expr\Assign;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        // Membuat akun admin baru
        $admin = User::create([
            'name' => 'Admin Pb.Suryakencana',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123@ok') // Menggunakan password admin123
        ]);

        $admin->assignRole('admin'); // Memberikan role admin kepada akun admin
    }
}
