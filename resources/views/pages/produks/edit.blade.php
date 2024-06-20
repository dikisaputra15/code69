@extends('layouts.app')

@section('title', 'Edit Produk')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Form Edit Produk</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.update', $produk) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                                <label>Nama Warung</label>
                                <select class="form-control" name="id_warung">
                                    <?php
                                        foreach ($warungs as $warung) {

                                        if ($warung->id==$produk->id_kategori) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $warung->id;?>"><?php echo $warung->nama_warung; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    <?php
                                        foreach ($kategoris as $kategori) {

                                        if ($kategori->id==$produk->id_kategori) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $kategori->id;?>"><?php echo $kategori->nama_kategori; ?></option>

                                     <?php } ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}">
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}">
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <input type="text" class="form-control" name="deskripsi_produk" value="{{ $produk->deskripsi_produk }}">
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                <input type="text" class="form-control" name="old_file" value="{{ $produk->path_gambar }}" hidden>
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
