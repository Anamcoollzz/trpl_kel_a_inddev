@extends('my-view')
@section('other-box')
@yield('filter')
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>No</th>
        <th>Waktu</th>
        <th>User</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>No</th>
        <th>Waktu</th>
        <th>User</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->no }}</td>
        <td>{{ $d->created_at }}</td>
        <td>{{ $d->user->nama }}</td>
        <td>
            @if($d->status == 'waiting for payment' || $d->status == 'waiting payment verification')
            <span class="badge bg-warning">{{$d->status}}</span>
            @else
            <span class="badge">{{$d->status}}</span>
            @endif
        </td>
        <td>
            @include('detail_button', ['link' => route('admin.transaksi.detail', [$d->id])])
        </td>
    </tr>
    @endforeach
</tbody>
@endsection