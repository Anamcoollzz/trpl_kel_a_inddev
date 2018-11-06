@extends('my-view')
@section('other-box')
@yield('filter')
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal Unggah</th>
        <th>Developer</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal Unggah</th>
        <th>Developer</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->nama }}</td>
        <td>{{ tglIndo($d->created_at) }}</td>
        <td>{{ $d->user->nama }}</td>
        <td>
            <span class="badge bg-{{$d->warna_status}}">
            {{ $d->status }}
            </span>
        </td>
        <td>
            @include('detail_button', ['link' => route('admin.produk.detail', [$d->id])])
        </td>
    </tr>
    @endforeach
</tbody>
@endsection