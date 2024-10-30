@extends('layouts.app')

@section('title', 'Update Pembayaran')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Form Update Pembayaran</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Update Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="/updatepembayaran" method="POST">
            @csrf
            <div class="card-body">

                            <div class="form-group" hidden>
                                <label>id peserta</label>
                                <input type="text" class="form-control" name="id_peserta" value="{{$item->id}}">
                            </div>

                            <div class="form-group" hidden>
                                <label>id produk</label>
                                <input type="text" class="form-control" name="id_produk" value="{{$item->id_produk}}">
                            </div>

                            <div class="form-group">
                                <label>Status Pembayaran</label>
                                <select class="form-control" name="status">
                                    <option value="Unpaid">Unpaid</option>
                                    <option value="Paid">Paid</option>
                                </select>
                            </div>



                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')

@endpush
