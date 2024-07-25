<h3><center>Laporan Penjualan</center></h3>
<hr>

<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>No</th>
    <th>Tanggal Pemesanan</th>
    <th>Jumlah</th>
    <th>Harga Bayar</th>
    <th>Sub Total</th>
  </tr>
  @php($i = 1)
  @foreach($pesanans as $pesan)
  <tr>
    <td>{{ $i++ }}</td>
    <td>{{$pesan->tgl_pemesanan}}</td>
    <td>{{$pesan->jml}}</td>
    <td>Rp. {{$pesan->harga_bayar}}</td>
    <td>Rp. {{$pesan->sub_total}}</td>
  </tr>
  @endforeach
  <tr>

    <td colspan="4" style="text-align: center;">Total Pendapatan</td>
    <td>Rp. {{$total}}</td>
  </tr>
</table>


