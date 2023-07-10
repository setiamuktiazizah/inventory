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
        <h5>Laporan Pengembalian</h4>
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
                                        <th>Jumlah</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Maks Tgl Kembali</th>
                                        <th>Tgl Kembali</th>
                                        <th>Note</th>
                                        <th>Surat</th>
                                        <th>Status</th>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($data_returnItem as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->loan_item->loan_request->item->add_item->name}}</td>
                                        <td>{{ $data->loan_item->loan_request->item->add_item->brand }}</td>
                                        <td>{{ $data->loan_item->loan_request->item->add_item->quantity }}</td>
                                        <td>{{$data->loan_item->loan_request->loan_date}}</td>
                                        <td>{{$data->loan_item->loan_request->max_return_date}}</td>
                                        <td>{{$data->return_date}}</td>
                                        <td>{{$data->loan_item->loan_request->note}}</td>
                                        <td>{{$data->loan_item->loan_request->path_file_cdn}}</td>
                                        @if($data->loan_item->status == "done late")
                                            <td><div class="badge-pill badge-warning">DoneLate</span></div></td>
                                        @elseif($data->loan_item->status == "done")
                                            <td><div class="badge-pill badge-success">Done</span></div></td>
                                        @elseif($data->loan_item->status == "active")
                                            <td><div class="badge-pill badge-primary">Active</span></div></td>
                                        @elseif($data->loan_item->status == "late")
                                            <td><div class="badge-pill badge-danger">Late</span></div></td>
                                        @else
                                            <td><div></div></td>
                                        @endif
                                    </tr>
                                    @endforeach
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
  
</body>

</html>