@extends('layouts.app')

@section('title', 'Transaksi')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">History Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nomor Meja</th>
                        <th>Nama Pemesan</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$pesanan->tgl_pemesanan}}</td>
                        <td>{{$pesanan->no_meja}}</td>
                        <td>{{$pesanan->nama_pemesan}}</td>
                        <td>{{$pesanan->total_bayar}}</td>
                        <td>{{$pesanan->status}}</td>
                        <td>{{$pesanan->keterangan}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush
