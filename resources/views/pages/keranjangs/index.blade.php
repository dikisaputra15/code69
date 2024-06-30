@extends('layouts.appfront')

@section('title', 'Data Pesanan')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Data Pesanan</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Meja</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($mejas as $meja)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$meja->no_meja}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="/meja/{{$meja->id}}/lihatpesanan"
                                    class="btn btn-sm btn-info btn-icon">
                                    <i class="fas fa-edit"></i>
                                    Lihat Pesanan
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
