<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AddItem;
use App\Models\Category;

use App\Models\Item;

use App\Models\ItemUnit;

use App\Models\LoanItem;
use App\Models\LoanRequest;
use App\Models\ReduceItem;
use App\Models\ReturnItem;

use App\Models\Role;
use App\Models\SuperCategory;
use App\Models\User;

// use App\Models;


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

    public function run()
    {
        $this->generateRoles();
        $this->generateUsers();
        
        $this->generateItemUnits();
        $this->generateSuperCategories();
        $this->generateCategories();
    

        $this->generateAddItems_and_Items();
        $this->generateAddItems_Items_and_ReduceItems();


    }



    private function generateRoles()
    {
        Role::customCreate('Admin', 'NIP');
        Role::customCreate('Operator', 'NIP');
        Role::customCreate('Peminjam Dosen', 'NIP');
        Role::customCreate('Peminjam Mahasiswa', 'NIM');
    }

    private function generateUsers()
    {
        User::customCreate(1, 'admin', bcrypt('admin12345'), 'admin@gmail.com', '000', '000');
        User::customCreate(2, 'operator', bcrypt('admin12345'), 'operator@gmail.com', '000', '000');
        User::customCreate(3, 'peminjam_dosen', bcrypt('admin12345'), 'dosen@gmail.com', '000', '000');
        User::customCreate(4, 'peminjam_mahasiswa', bcrypt('admin12345'), 'mahasiswa@gmail.com', '000', '000');
    }

    private function generateSuperCategories()
    {
        SuperCategory::customCreate('Aset', true);
        SuperCategory::customCreate('BHP', false);
    }

    private function generateItemUnits()
    {
        ItemUnit::customCreate('Unit', 1);
        ItemUnit::customCreate('Lusin', 12);
        ItemUnit::customCreate('Rim', 500);
        ItemUnit::customCreate('Kodi', 20);
        ItemUnit::customCreate('Pack10', 10);
    }

    private function generateCategories()
    {
        Category::customCreate(2, 5, 'Pulpen', 1);
        Category::customCreate(2, 5, 'Pensil', 1);
        Category::customCreate(1, 1, 'Laptop', 1);
        Category::customCreate(1, 1, 'Projector', 1);

    }

    private function generateAddItems_and_Items()
    {
        AddItem::customCreate(1, '2023-05-05 02:57:03', 'Pulpen Snowman', 'Snowman', 10, 10000, 'Baik');
        Item::customCreate(1, 1, 999, 'Pulpen Snowman', 'Snowman', 10, 'Tambah');

        AddItem::customCreate(2, '2023-05-05 02:57:03', 'Pensil FaberCastell', 'FaberCastell', 10, 10000, 'Baik');
        Item::customCreate(2, 2, 999, 'Pensil FaberCastell', 'FaberCastell', 10, 'Tambah');

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus', 'Asus', 1, 4000000, 'Baik');
        Item::customCreate(3, 3, 999, 'Laptop Asus', 'Asus', 1, 'Tambah');
        
        AddItem::customCreate(4, '2023-05-05 02:57:03', 'Projector Sony', 'Sony', 1, 3500000, 'Baik');
        Item::customCreate(4, 4, 999, 'Projector Sony', 'Sony', 1, 'Tambah');
    }

    private function generateAddItems_Items_and_ReduceItems()
    {
        AddItem::customCreate(1, '2023-05-05 02:57:03', 'Pulpen Joyko', 'Joyko', 10, 10000, 'Baik');
        Item::customCreate(5, 1, 999, 'Pulpen Joyko', 'Joyko', 10, 'Tambah');
        ReduceItem::customCreate('2023-05-07 02:57:03', 5, 'Penggunaan', 5);

        AddItem::customCreate(4, '2023-05-05 02:57:03', 'Projector Phillips', 'Phillips', 1, 10000, 'Tidak Baik');
        Item::customCreate(6, 4, 999, 'Projector Phillips', 'Phillips', 1, 'Tambah');
        ReduceItem::customCreate('2023-05-07 02:57:03', 1, 'Rusak', 6);
    }



}
