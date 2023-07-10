<?php

namespace App\Exports;

use App\Models\ReduceItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReduceItemExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ReduceItem::leftjoin('items', 'reduce_items.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->select('reduce_items.id', 'reduce_items.date', 'add_items.name', 'reduce_items.quantity', 'reduce_items.cause')
            ->get();
    }
}
