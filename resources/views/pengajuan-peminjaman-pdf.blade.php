<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Inventori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>

<body id="page-top"> 
    <center>
        <h5>Laporan Pengajuan Peminjaman</h4>
    </center>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        {{-- <th>Jumlah</th> --}}
                                        <th>Tgl Pinjam</th>
                                        <th>Maks Tgl Kembali</th>
                                        {{-- <th>Tgl Kembali</th> --}}
                                        <th>Surat</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        
                                        {{-- @endcan --}}
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    {{-- @dd($data_loanRequests[0]->item->add) --}}
                                    @foreach($data_loanRequests as $loanRequest)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $loanRequest->item->add_item->name }}</td>
                                            <td>{{ $loanRequest->item->add_item->brand }}</td>
                                            <td>{{ $loanRequest->loan_date }}</td>
                                            <td>{{ $loanRequest->max_return_date }}</td>
                                            <td>{{ $loanRequest->path_file_cdn }}</td>

                                            @if($loanRequest->status == "pending")
                                                <td><div class="badge-pill badge-warning">Pending</span></div></td>
                                            @elseif($loanRequest->status == "accepted")
                                                <td><div class="badge-pill badge-success">Accepted</span></div></td>
                                            @elseif($loanRequest->status == "rejected")
                                                <td><div class="badge-pill badge-danger">Rejected</span></div></td>
                                            @else
                                                error
                                            @endif

                                            <td>{{ $loanRequest->note }}</td>
                                            
                                           
                                        </tr>    
                                    @endforeach
                                   
</body>

</html>