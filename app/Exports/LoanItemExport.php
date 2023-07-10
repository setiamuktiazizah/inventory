<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\LoanItem;

class LoanItemExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LoanItem::leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('items', 'loan_requests.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->leftjoin('return_items', 'loan_items.id', '=', 'return_items.id_loan_item')
            ->select('loan_items.id', 'add_items.name', 'add_items.quantity', 'loan_requests.loan_date', 'loan_requests.max_return_date', 'return_items.return_date', 'loan_requests.note', 'loan_requests.path_file_cdn', 'loan_items.status')
            ->get();
    }
}
