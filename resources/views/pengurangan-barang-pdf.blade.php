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
                    <h5>Laporan Pengurangan Barang</h4>
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
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Alasan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($reduceItems as $reduceItem)
                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$reduceItem->date}} </td>
                                        <td>{{$reduceItem->item->add_item->name}} </td>
                                        <td>{{$reduceItem->quantity}} </td>
                                        <td>{{$reduceItem->cause}} </td>
                                         
                                    </tr>
                                    @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


</body>
</html>