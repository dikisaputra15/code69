@extends('layouts.appfront')

@section('title', 'Pembayaran')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
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
                        <th>Action</th>
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
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="#"
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Bayar
                                </a>
                            </div>
                        </td>
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
