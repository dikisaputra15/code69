@extends('layouts.app')

@section('title', 'Peserta')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Data Peserta</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Peserta</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>No Wa</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Status Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($pesertas as $produk)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $produk->nama_peserta }}</td>
                            <td>{{ $produk->no_wa }}</td>
                            <td>{{ $produk->email }}</td>
                            <td>{{ $produk->alamat }}</td>
                            <td>{{ $produk->status }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href='/peserta/{{$produk->id}}/updatepembayaran'
                                        class="btn btn-sm btn-info">
                                            Update
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
