<!DOCTYPE html>
<html>
<head>
	<title>Invoice {{$transaksi->no}}</title>
	<style>
	* {
		font-family: sans-serif;
		color: #7A7A7A;
		-webkit-print-color-adjust: exact;
	}
	.table {
		width: 100%;
		border-collapse: collapse;
	}
	.table thead, .table th {
		background-color: #05417A;
		color: white;
	}
	.table td, .table th {
		padding: 10px 20px;
		border: 1px solid #EAEAEA;
	}
	.table-identitas {
		width: 100%;
	}
	.table-identitas td {
		padding: 10px 5px;
	}
</style>
</head>
<body>
	<div>
		{{-- <div style="z-index: -1; border: 5px solid #306CC7; border-radius: 20px; position: relative; top: 25%; padding: 30px; font-size: 30px; color: #314EFF;">LUNAS</div> --}}
		<h1 style="color: #314EFF">INDDEV</h1>
		<table class="table-identitas">
			<tr>
				<td>No</td>
				<td>{{$transaksi->no}}</td>
				<td>Waktu</td>
				<td>{{waktuIndo($transaksi->created_at)}}</td>
			</tr>
			<tr>
				<td>Kepada</td>
				<td>{{$transaksi->user->nama}}</td>
				<td>Kepada</td>
				<td>{{$transaksi->user->alamat}}</td>
			</tr>
		</table>
		<br>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th width="400px;">Produk</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($transaksi->detail as $d)
				<tr>
					<td @if($loop->iteration%2 == 0) style="background-color: #62B1D6;" @else style="background-color: #CEECF3" @endif>{{$d->nama_produk}}</td>
					<td @if($loop->iteration%2 == 0) style="background-color: #62B1D6;" @else style="background-color: #CEECF3" @endif>{{rp($d->harga_jual)}}</td>
				</tr>
				@endforeach
				{{-- <tr>
					<td>Status</td>
					<td>{{$transaksi->status}}</td>
				</tr> --}}
			</tbody>
		</table>
		<br>
		{{-- <h4 style="text-align: center; color: #0D9126; border: 5px solid #0D9126;">SUKSES</h4> --}}
		<br>
		{{-- <br> --}}
		<table class="table">
			<tbody>
				<tr>
					<td width="400px;"><strong>Total</strong></td>
					<td>
						{{rp($transaksi->detail->sum(function($item){return $item->harga_jual;}))}}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script>
		print();
	</script>
</body>
</html>