@extends('layouts.app')

@section('title', 'Webinar')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Data Webinar</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Webinar</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($webinars as $produk)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td><img src="{{ Storage::url('piccourse/'.$produk->path_gambar) }}" style="width:60px; height:60px;"></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href='/peserta/{{$produk->id}}/lihatpeserta'
                                        class="btn btn-sm btn-info btn-icon">
                                            <i class="fas fa-edit"></i>
                                            Lihat Peserta
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
