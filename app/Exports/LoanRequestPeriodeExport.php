<?php

namespace App\Exports;

use App\Models\LoanRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoanRequestPeriodeExport implements FromCollection
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
        return LoanRequest::leftjoin('items', 'loan_requests.id_item', '=', 'items.id')
            ->leftjoin('add_items', 'items.id_add_item', '=', 'add_items.id')
            ->where('loan_requests.loan_date', '>=', $this->tgl_awal)
            ->where('loan_requests.loan_date', '<=', $this->tgl_akhir)
            ->select('add_items.name', 'add_items.brand', 'loan_requests.loan_date', 'loan_requests.max_return_date', 'loan_requests.path_file_cdn', 'loan_requests.status', 'loan_requests.note')
            ->get();
    }
}
