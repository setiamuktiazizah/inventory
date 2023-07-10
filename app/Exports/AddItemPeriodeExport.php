<?php

namespace App\Exports;

use App\Models\AddItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class AddItemPeriodeExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
    }
    public function collection()
    {
        return AddItem::leftjoin('categories', 'add_items.id_category', '=', 'categories.id')
            ->leftjoin('users', 'add_items.created_by', '=', 'users.id')
            ->where('add_items.date', '>=', $this->tgl_awal)
            ->where('add_items.date', '<=', $this->tgl_akhir)
            ->select('add_items.date', 'categories.name', 'add_items.name', 'add_items.brand', 'add_items.quantity', 'add_items.price', 'add_items.cause', 'users.name')
            ->get();
    }
}
