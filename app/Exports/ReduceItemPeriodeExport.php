<?php

namespace App\Exports;

use App\Models\ReduceItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReduceItemPeriodeExport implements FromCollection
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
        return ReduceItem::leftjoin('items', 'reduce_items.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->where('reduce_items.date', '>=', $this->tgl_awal)
            ->where('reduce_items.date', '<=', $this->tgl_akhir)
            ->select('reduce_items.date', 'add_items.name', 'reduce_items.quantity', 'reduce_items.cause')
            ->get();
    }
}
