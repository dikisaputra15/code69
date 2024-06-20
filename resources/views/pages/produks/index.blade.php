@extends('layouts.app')

@section('title', 'Produk')

@section('main')
<h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
    </div>
    <div class="card-body">
        <div class="section-header-button">
            <a href="{{route('produk.create')}}"
                class="btn btn-primary">Add New</a>
        </div><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Warung</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $produk->nama_warung }}</td>
                            <td>{{ $produk->nama_kategori }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td><img src="{{ Storage::url('gambarproduk/'.$produk->path_gambar) }}" style="width:60px; height:60px;"></td>
                            <td>{{ $produk->deskripsi_produk }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href='{{ route('produk.edit', $produk->id) }}'
                                        class="btn btn-sm btn-info btn-icon">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                    </a>

                                    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="ml-2">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete" onclick="return confirm('Are you sure to delete this ?');">
                                            <i class="fas fa-times"></i> Delete
                                        </button>
                                    </form>
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
