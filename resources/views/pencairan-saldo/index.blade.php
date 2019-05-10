@extends('my-view')
@section('other-box')
@yield('filter')
@endsection
@section('table')
<thead>
    <tr>
        <th>ID</th>
        <th>Waktu</th>
        <th>User</th>
        <th>Jumlah</th>
        <th>No Rek Tujuan</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Waktu</th>
        <th>User</th>
        <th>Jumlah</th>
        <th>No Rek Tujuan</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Aksi</th>
    </tr>
</tfoot>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->created_at }}</td>
        <td>{{ $d->user->nama }}</td>
        <td align="right">{{ rp($d->jumlah) }}</td>
        <td align="right">{{ $d->rekening->no_rek }}</td>
        <td>
            @if($d->status == 'pending')
            <span class="badge bg-warning">{{$d->status}}</span>
            @elseif($d->status == 'success')
            <span class="badge bg-success">{{$d->status}}</span>
            @else
            <span class="badge">{{$d->status}}</span>
            @endif
        </td>
        <td>
            @if($d->status == 'success')
            <a href="{{$d->bukti_transfer}}" target="_blank">
                Lihat
            </a>
            @endif
        </td>
        <td>
            @if($d->status == 'pending')
            <a href="" class="btn btn-success btn-flat"
            onclick="terima(event, '{{route('terima-saldo',[$d->id])}}', {{$d->id}})">Verifikasi</a>
            @endif

            {{-- <a href="" class="btn btn-danger btn-flat" 
            onclick="tolak(event, '{{route('tolak-saldo',[$d->id])}}')">Tolak</a> --}}
        </td>
    </tr>
    @endforeach
</tbody>
@endsection

@push('script')
<script>
    function terima(e, actionLink, id){
        e.preventDefault();
        $('#modalTerima').modal('show');
        $('#modalTerima').parents('form').attr('action',actionLink);
        $('#modalTerima').find('[name="id"]').val(id);
    }
    function terima2(actionLink, id){
        $('#modalTerima').modal('show');
        $('#modalTerima').parents('form').attr('action',actionLink);
        $('#modalTerima').find('[name="id"]').val(id);
    }
    @if($errors->has('bukti_transfer'))
    terima2('{{route('terima-saldo',[old('id')])}}')
    @endif
</script>
@endpush

@push('modal')

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id">
    @method('put')
    @csrf
    <div class="modal fade" id="modalTerima" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Terima</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('bukti_transfer') ? 'has-error' : ''}}">
                      <label for="bukti_transfer">Bukti Transfer</label>
                      <input required="required" type="file" accept="image/png,image/jpeg" name="bukti_transfer" id="bukti_transfer">
                      <p class="help-block">Hanya jpg dan png yang diperbolehkan.</p>
                      @if($errors->has('bukti_transfer'))
                      <span class="help-block">{{$errors->first('bukti_transfer')}}</span>
                      @endif
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-flat btn-primary">Verifikasi</button>
            </div>
        </div>
    </div>
</div>
</form>
@endpush
