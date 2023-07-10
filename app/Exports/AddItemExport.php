<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\AddItem;

class AddItemExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AddItem::leftjoin('categories', 'add_items.id_category', '=', 'categories.id')
            ->leftjoin('users', 'add_items.created_by', '=', 'users.id')
            ->select('add_items.id', 'add_items.date', 'categories.name', 'add_items.name', 'add_items.brand', 'add_items.quantity', 'add_items.price', 'add_items.cause', 'users.name')
            ->get();
    }
}
