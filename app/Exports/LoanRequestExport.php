<?php

namespace App\Exports;

use App\Models\LoanRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoanRequestExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LoanRequest::leftjoin('items', 'loan_requests.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->select('loan_requests.id', 'add_items.name', 'add_items.brand', 'loan_requests.loan_date', 'loan_requests.max_return_date', 'loan_requests.path_file_cdn', 'loan_requests.status', 'loan_requests.note')
            ->get();
    }
}
