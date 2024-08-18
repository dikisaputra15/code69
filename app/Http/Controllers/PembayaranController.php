<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pesanans = DB::table('pesanans')
                ->join('mejas', 'mejas.id', '=', 'pesanans.id_meja')
                ->select('pesanans.*', 'mejas.no_meja')
                ->orderBy('pesanans.id', 'desc')->get();
        return view('pages.pembayarans.index', compact('pesanans'));
    }

    public function bayar($id)
    {
        $pesanan = Pesanan::find($id);
        $id_meja = $pesanan->id_meja;
        $meja = Meja::find($id_meja);
        $detailpesans = DB::table('detailpesanans')
            ->join('produks', 'produks.id', '=', 'detailpesanans.id_produk')
            ->select('detailpesanans.*', 'produks.nama_produk', 'produks.path_gambar')
            ->where('detailpesanans.id_pesanan', $id)->orderBy('detailpesanans.id', 'desc')->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pesanan->id,
                'gross_amount' => $pesanan->total_bayar,
            ),
            'customer_details' => array(
                'name' => $pesanan->nama_pemesan,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pages.pembayarans.bayar', compact('snapToken', 'pesanan', 'meja', 'detailpesans'));
    }

    public function invoice($id)
    {
        $pesanan = Pesanan::find($id);
        $id_meja = $pesanan->id_meja;
        $meja = Meja::find($id_meja);
        $detailpesans = DB::table('detailpesanans')
            ->join('produks', 'produks.id', '=', 'detailpesanans.id_produk')
            ->select('detailpesanans.*', 'produks.nama_produk', 'produks.path_gambar')
            ->where('detailpesanans.id_pesanan', $id)->orderBy('detailpesanans.id', 'desc')->get();

        return view('pages.pembayarans.invoice', compact('pesanan', 'meja', 'detailpesans'));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $order = Pesanan::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }

    public function transaksi(Request $request)
    {
        $id = auth()->user()->id_warung;
        if(auth()->user()->id_warung == 0){
            $warungs = DB::table('warungs')->orderBy('id', 'desc')->get();
        }else{
            $warungs = DB::table('warungs')->where('id', $id)->orderBy('id', 'desc')->get();
        }
        return view('pages.pembayarans.transaksi', compact('warungs'));
    }

    public function pesananmasuk(Request $request)
    {
        $id = auth()->user()->id_warung;
        $pesanans = DB::table('pesanans')
        ->join('mejas', 'mejas.id', '=', 'pesanans.id_meja')
        ->join('detailpesanans', 'pesanans.id', '=', 'detailpesanans.id_pesanan')
        ->select('pesanans.*', 'mejas.no_meja', 'detailpesanans.*')
        ->where('pesanans.status', 'Paid')
        ->where('pesanans.keterangan', 'diproses')
        ->where('detailpesanans.id_warung', $id)
        ->orderBy('pesanans.id', 'desc')
        ->get();
        return view('pages.pembayarans.pesananmasuk', compact('pesanans'));
    }

    public function updatepesananmasuk($id)
    {
        $detail = \App\Models\Detailpesanan::findOrFail($id);
        $id_pesanan = $detail->id_pesanan;
        DB::table('pesanans')->where('id',$id_pesanan)->update([
            'keterangan' => 'selesai'
        ]);

        return redirect("/pesananmasuk");
    }

    public function allpesanan(Request $request)
    {
        $id = auth()->user()->id_warung;
        $pesanans = DB::table('pesanans')
        ->join('mejas', 'mejas.id', '=', 'pesanans.id_meja')
        ->join('detailpesanans', 'pesanans.id', '=', 'detailpesanans.id_pesanan')
        ->select('pesanans.*', 'mejas.no_meja', 'detailpesanans.*')
        ->where('detailpesanans.id_warung', $id)
        ->orderBy('pesanans.id', 'desc')
        ->get();
        return view('pages.pembayarans.allpesanan', compact('pesanans'));
    }

}
