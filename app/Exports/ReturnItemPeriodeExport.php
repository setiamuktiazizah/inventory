<?php

namespace App\Exports;

use App\Models\ReturnItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnItemPeriodeExport implements FromCollection
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
        return ReturnItem::leftjoin('loan_items', 'return_items.id_loan_item', '=', 'loan_items.id')
            ->leftjoin('loan_requests', 'loan_items.id_loan_request', '=', 'loan_requests.id')
            ->leftjoin('items', 'loan_requests.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->where('return_items.return_date', '>=', $this->tgl_awal)
            ->where('return_items.return_date', '<=', $this->tgl_akhir)
            ->select('add_items.name', 'add_items.brand', 'add_items.quantity', 'loan_requests.loan_date', 'loan_requests.max_return_date', 'return_items.return_date', 'loan_requests.note', 'loan_requests.path_file_cdn', 'loan_items.status')
            ->get();
    }
}
