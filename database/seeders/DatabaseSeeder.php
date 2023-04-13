<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * 
     * 
     * 
     */

    private function generateRoles()
    {
        Role::customCreate('Admin', 'NIP');
        Role::customCreate('Operator', 'NIP');
        Role::customCreate('Peminjam Dosen', 'NIP');
        Role::customCreate('Peminjam Mahasiswa', 'NIM');
    }

    private function generateUsers()
    {
        User::customCreate(1, 'admin', 'admin12345', 'admin@gmail.com', '000', '000');
        User::customCreate(2, 'operator', 'admin12345', 'admin@gmail.com', '000', '000');
        User::customCreate(3, 'peminjam_dosen', 'admin12345', 'admin@gmail.com', '000', '000');
        User::customCreate(4, 'peminjam_mahasiswa', 'admin12345', 'admin@gmail.com', '000', '000');
    }
    
    public function run()
    {
        $this->generateRoles();
        $this->generateUsers();
    }
}
