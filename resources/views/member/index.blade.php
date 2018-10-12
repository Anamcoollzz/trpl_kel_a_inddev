@extends('my-view')
@section('other-box')
@yield('filter')
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
        <td>
            @if($d->status == 'pending')
            <a href="{{route('verifikasi-member',[$d->id])}}" class="btn btn-warning btn-flat">Verifikasi</a>
            @endif
        </td>
    </tr>
    @endforeach
</tbody>
@endsection