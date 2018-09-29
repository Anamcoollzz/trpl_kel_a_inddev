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
        {{-- <th>Aksi</th> --}}
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Alamat</th>
        {{-- <th>Aksi</th> --}}
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
    </tr>
    @endforeach
</tbody>
@endsection