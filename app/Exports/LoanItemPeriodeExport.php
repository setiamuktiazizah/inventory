<?php

namespace App\Exports;

use App\Models\LoanItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoanItemPeriodeExport implements FromCollection
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
        return LoanItem::leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('items', 'loan_requests.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->leftjoin('return_items', 'loan_items.id', '=', 'return_items.id_loan_item')
            ->where('loan_requests.loan_date', '>=', $this->tgl_awal)
            ->where('loan_requests.loan_date', '<=', $this->tgl_akhir)
            ->select('add_items.name', 'add_items.quantity', 'loan_requests.loan_date', 'loan_requests.max_return_date', 'return_items.return_date', 'loan_requests.note', 'loan_requests.path_file_cdn', 'loan_items.status')
            ->get();
    }
}
