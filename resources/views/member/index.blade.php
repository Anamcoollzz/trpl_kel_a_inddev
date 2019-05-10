@extends('my-view')
@section('other-box')
<a href="?status=verified" class="btn btn-success btn-flat">Verified</a>
<a href="?status=pending" class="btn btn-warning btn-flat">Pending</a>
<a href="?time=today" class="btn bg-maroon btn-flat">Hari ini</a>
<a href="?time=this_month" class="btn bg-purple btn-flat">Bulan ini</a>
<br>
<br>
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Waktu Daftar</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Status</th>
        <th>Waktu Daftar</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->nama }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->no_hp }}</td>
        <td>{{ $d->alamat }}</td>
        <td>
            @if($d->status == 'pending')
            <span class="label bg-yellow">{{$d->status}}</span>
            @elseif($d->status == 'verified')
            <span class="label bg-green">{{$d->status}}</span>
            @else
            <span class="label bg-red">{{$d->status}}</span>
            @endif
        </td>
        <td>{{ $d->created_at }}</td>
        <td>
            @if($d->status == 'pending')
            <a href="{{route('verifikasi-member',[$d->id])}}" class="btn btn-warning btn-flat">Verifikasi</a>
            @endif
            <a href="{{route('blokir-member',[$d->id])}}" class="btn btn-danger btn-flat">Blokir</a>
        </td>
    </tr>
    @endforeach
</tbody>
@endsection

@section('custom_dt')
    <script>
    $(function () {
        $("#dt").DataTable({
            "order" : [[6, "desc"]]
        });
    });
</script>
@endsection