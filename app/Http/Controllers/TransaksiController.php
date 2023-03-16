<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $halamanaktif = (request('page')) ?? 1;
        // $transaksi= Transaksi::with(['admin', 'pelanggan'])->latest()->paginate();
        $transaksi= Transaksi::with(['admin', 'pelanggan'])->whereraw("date(convert_tz(created_at, '+00:00','+7:00'))= curdate()");
        if(request('page')){
            $transaksi= Transaksi::with(['admin', 'pelanggan'])->whereraw("date(convert_tz(created_at, '+00:00','+7:00'))=". Transaksi::raw('curdate()+1-'. (request('page'))));
        }
        $today = Carbon::now('Asia/Jakarta')->locale('id','en');
        $today->addDay(1-$halamanaktif, 'days');
        return view('notas', [
            "title" => "Nota",
            "active" => "nota",
            "transaksi" => $transaksi->get(),
            //"tanggal" => date('l', strtotime( '+' . 1-$halamanaktif . ' days' )) .' '. date('d')+1-$halamanaktif,
            "tanggal" => $today->isoFormat('dddd, LL'),
            "halamanaktif" => $halamanaktif
       
            //"tanggal" => Carbon::now('Asia/Jakarta')->locale('id','en')->isoFormat('LLLL'),
            // "transaksi" => Transaksi::with(['admin', 'pelanggan'])->whereDate('created_at', Transaksi::raw('curdate()'))
        ]);
    }

    public function show(Transaksi $data)
    {
        
        return view('nota', [
            "title" => "Info Pelanggan",
            "active" => "nota",
            "datapelanggan" => $data
            
            // "halamanaktif" => (request('page')) ?? 1
        ]);
    }
}
