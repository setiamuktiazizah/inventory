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
        $this->generateAddItems_Items_LoanRequest_LoanItem_ReturnItem();

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
        AddItem::customCreate(1, '2023-05-05 02:57:03', 'Pulpen Snowman', 'Snowman', 10, 10000, 'Tambah', 999);
        Item::customCreate(1, 10, 'Baik', false);

        AddItem::customCreate(2, '2023-05-05 02:57:03', 'Pensil FaberCastell', 'FaberCastell', 10, 10000, 'Tambah', 999);
        Item::customCreate(2, 10, 'Baik', false);

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(3, 1, 'Baik', false);
        
        AddItem::customCreate(4, '2023-05-05 02:57:03', 'Projector Sony', 'Sony', 1, 3500000, 'Tambah', 999);
        Item::customCreate(4, 1, 'Baik', false);
    }

    private function generateAddItems_Items_and_ReduceItems()
    {
        AddItem::customCreate(1, '2023-05-05 02:57:03', 'Pulpen Joyko', 'Joyko', 10, 10000, 'Tambah', 999);
        Item::customCreate(5, 5, 'Baik', false);
        ReduceItem::customCreate('2023-05-07 02:57:03', 5, 'Penggunaan', 5);

        AddItem::customCreate(4, '2023-05-05 02:57:03', 'Projector Phillips', 'Phillips', 1, 10000, 'Tambah', 999);
        Item::customCreate(6, 0, 'Rusak', true);
        ReduceItem::customCreate('2023-05-07 02:57:03', 1, 'Rusak', 6);
    }

    private function generateAddItems_Items_LoanRequest_LoanItem_ReturnItem()
    {
        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus1', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(7, 1, 'Baik', false);
        LoanRequest::customCreate(7, '2024-01-01 02:57:03', '2024-01-30 02:57:03', 'pathfile', 'pending', '');

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus2', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(8, 1, 'Baik', false);
        LoanRequest::customCreate(8, '2024-01-01 02:57:03', '2024-01-30 02:57:03', 'pathfile', 'rejected', '');

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus3', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(9, 1, 'Baik', false);
        LoanRequest::customCreate(9, '2023-01-01 02:57:03', '2023-01-30 02:57:03', 'pathfile', 'accepted', 'dummy returned on time');
        LoanItem::customCreate(3, 'done');
        ReturnItem::customCreate('2023-01-20 02:57:03', '', 1); // balikin ga telat

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus4', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(10, 1, 'Baik', false);
        LoanRequest::customCreate(10, '2023-01-01 02:57:03', '2023-01-30 02:57:03', 'pathfile', 'accepted', 'dummy late returned ');
        LoanItem::customCreate(4, 'done late');
        ReturnItem::customCreate('2023-02-20 02:57:03', '', 2); // balikin telat

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus5', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(11, 1, 'Baik', false);
        LoanRequest::customCreate(11, '2023-01-01 02:57:03', '2023-01-30 02:57:03', 'pathfile', 'accepted', 'dummy late unreturned');
        LoanItem::customCreate(5, 'late'); // telat n belom dibalikin

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus6', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(12, 1, 'Baik', false);
        LoanRequest::customCreate(12, '2023-01-01 02:57:03', '2023-10-30 02:57:03', 'pathfile', 'accepted', 'dummy1 on loan duration');
        LoanItem::customCreate(6, 'active'); 

        AddItem::customCreate(3, '2023-05-05 02:57:03', 'Laptop Asus7', 'Asus', 1, 4000000, 'Tambah', 999);
        Item::customCreate(13, 1, 'Baik', false);
        LoanRequest::customCreate(13, '2023-01-01 02:57:03', '2023-10-30 02:57:03', 'pathfile', 'accepted', 'dummy2 on loan duration');
        LoanItem::customCreate(7, 'active');
    }


}
