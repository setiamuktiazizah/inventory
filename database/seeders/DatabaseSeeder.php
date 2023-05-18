<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\SuperCategory;
use App\Models\ItemUnit;
use App\Models\AddItem;



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
        User::customCreate(2, 'operator', 'admin12345', 'operator@gmail.com', '000', '000');
        User::customCreate(3, 'peminjam_dosen', 'admin12345', 'dosen@gmail.com', '000', '000');
        User::customCreate(4, 'peminjam_mahasiswa', 'admin12345', 'mahasiswa@gmail.com', '000', '000');
    }

    private function generateSuperCategories()
    {
        SuperCategory::customCreate('Aset', true);
        SuperCategory::customCreate('BHP', false);
    }

    private function generateItemUnits()
    {
        ItemUnit::customCreate('Lusin', 12);
        ItemUnit::customCreate('Rim', 500);
        ItemUnit::customCreate('Kodi', 20);
        ItemUnit::customCreate('Pack10', 10);
    }

    private function generateCategories()
    {
        Category::customCreate(2, 4, 'Pulpen', 1);
    }

    private function generateAddItems()
    {
        AddItem::customCreate(1, '2023-05-05 02:57:03', 'Pulpen Snowman', 'Snowman', 1, 1, 'Tambah');
    }

    public function run()
    {
        $this->generateRoles();
        $this->generateUsers();

        $this->generateSuperCategories();
        $this->generateItemUnits();
        $this->generateCategories();
        $this->generateAddItems();


    }
}
