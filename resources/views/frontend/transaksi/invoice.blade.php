<!DOCTYPE html>
<html>
<head>
	<title>Invoice {{$transaksi->no}}</title>
	<style>
		* {
			font-family: sans-serif;
			color: #7A7A7A;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		td {
			padding: 5px;
			border: 1px solid #9F9F9F;
		}
	</style>
</head>
<body>
	<h2 style="color: #314EFF">INDDEV</h2>
<table>
	<tr>
		<td>No</td>
		<td>{{$transaksi->no}}</td>
	</tr>
	<tr>
		<td>Produk</td>
		<td>Harga</td>
	</tr>
	@foreach ($transaksi->detail as $d)
	<tr>
		<td>{{$d->nama_produk}}</td>
		<td>{{rp($d->harga_jual)}}</td>
	</tr>
	@endforeach
	<tr>
		<td>Total</td>
		<td>
			{{$transaksi->detail->sum(function($item){return $item->harga_jual;})}}
		</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>{{$transaksi->status}}</td>
	</tr>
</table>
<script>
	print();
</script>
</body>
</html>