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
                    <h5>Laporan Pengadaan Barang</h4>
                </center>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tbl_list" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kategori</th>
                                        <th>Barang</th>
                                        <th>Merk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Jenis Pengadaan</th>
                                        <th>Admin</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($data_addItems as $addItem)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$addItem->date}} </td>
                                        <td>{{$addItem->category->name}} </td>
                                        <td>{{$addItem->name}} </td>
                                        <td>{{$addItem->brand}} </td>
                                        <td>{{$addItem->quantity}} </td>
                                        <td>{{$addItem->price}} </td>
                                        <td>{{$addItem->cause}} </td>
                                        <td>{{$addItem->creator->name}} </td>
                                     
                                    </tr>
                                    @endforeach

                                    
                
</body>

</html>
