@extends('layouts.appfront')

@section('title', 'invoice')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Invoice</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Jumlah</th>
                        <th>Harga Bayar</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                    @foreach ($detailpesans as $detail)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$detail->nama_produk}}</td>
                        <td><img src="{{ Storage::url('gambarproduk/'.$detail->path_gambar) }}" style="width:60px; height:60px;"></td>
                        <td>{{$detail->jml}}</td>
                        <td>{{$detail->harga_bayar}}</td>
                        <td>{{$detail->sub_total}}</td>
                    </tr>
                @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>
                            {{$pesanan->total_bayar}}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Atas Nama Pemesan</td>
                        <td>
                          {{$pesanan->nama_pemesan}}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Nomor Meja</td>
                        <td>
                          {{$meja->no_meja}}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')
@endpush
