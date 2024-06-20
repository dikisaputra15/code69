@extends('layouts.app')

@section('title', 'Edit Kategori')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Form Edit Kategori</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
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
