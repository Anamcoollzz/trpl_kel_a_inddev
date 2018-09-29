@extends('my-view')
@section('other-box')
@yield('filter')
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>URL</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>URL</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->nama }}</td>
        <td>{{ url('kategori/'.$d->uri_routing) }}</td>
        <td>
            @include('edit_button', ['link' => route('kategori.edit', [$d->id])])
            @include('delete_button', ['link' => route('kategori.destroy', [$d->id])])
        </td>
    </tr>
    @endforeach
</tbody>
@endsection