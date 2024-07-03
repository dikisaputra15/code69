@extends('layouts.app')

@section('title', 'Produk')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Form Tambah Produk</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Warung</label>
                    <select class="form-control" name="id_warung">
                            <option>-Pilih Warung-</option>
                        @foreach ($warungs as $warung)
                            <option value="{{$warung->id}}">{{$warung->nama_warung}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="id_kategori">
                            <option>-Pilih Katgeori-</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                </div>

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" required>
                            </div>

                            <div class="form-group">
                                <label>Status Produk</label>
                                <select class="form-control" name="status_produk">
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <input type="text" class="form-control" name="deskripsi_produk" required>
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="gambar" required>
                            </div>

                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')

@endpush
