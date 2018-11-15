@extends('my-view')
@section('other-box')
@yield('filter')
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>Atas Nama</th>
        <th>Bank</th>
        <th>Cabang</th>
        <th>No Rekeing</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Atas Nama</th>
        <th>Bank</th>
        <th>Cabang</th>
        <th>No Rekeing</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->atas_nama }}</td>
        <td>{{ $d->nama_bank }}</td>
        <td>{{ $d->cabang }}</td>
        <td>{{ $d->no_rek }}</td>
        <td>
            @include('edit_button', ['link' => route('rekening.edit', [$d->id])])
            @include('delete_button', ['link' => route('rekening.destroy', [$d->id])])
        </td>
    </tr>
    @endforeach
</tbody>
@endsection