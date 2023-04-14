<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardNotaController;
use App\Http\Controllers\AdminPelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/nota', [TransaksiController::class, 'index'])->middleware('auth');
Route::get('/nota/{data:id}', [TransaksiController::class, 'show'])->middleware('auth');
//data:nama yang kiri bebas jadi apa aja yang penting sama dengan funtion show controller, lalu nama dikanan adalah colum database yang dipanggil

Route::get('/pelanggan', function(){
    return view('pelanggan', [
        'title' =>"Hutang",
        'active' => "pelanggan",
        'pelanggan' => Pelanggan::orderBy('nama')->get()
    ]);
})->middleware('auth');
Route::get('/pelanggan/{pelanggan:nama}', function(Pelanggan $pelanggan){
    return view('notas', [
        'title' =>$pelanggan->nama,
        'active' => "pelanggan",
        'transaksi' => $pelanggan->transaksi->load('pelanggan','admin'),
        "tanggal" =>""
    ]);
})->middleware('auth');

Route::get('/admins/{admin:username}', function(User $admin){
    return view('notas', [
        'title' =>"User",
        'active'=> "nota",
        "transaksi" => $admin->transaksi->load('pelanggan','admin'),
        "tanggal" =>""
        // "halamanaktif" => (request('page')) ?? 1
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    $today = Carbon::now('Asia/Jakarta')->locale('id','en');
    return view('dashboard.index', [
        "tanggal" => $today->isoFormat('dddd, LL'),
    ]);
})->middleware('auth');

Route::get('dashboard/nota', function(){
    $halamanaktif = (request('page')) ?? 1;
    // $transaksi= Transaksi::with(['admin', 'pelanggan'])->latest()->paginate();
    $transaksi= Transaksi::with(['admin', 'pelanggan'])->wheredate('created_at', Transaksi::raw('curdate()'));
    if(request('page')){
        $transaksi= Transaksi::with(['admin', 'pelanggan'])->wheredate('created_at', Transaksi::raw('curdate()+1-'. (request('page'))));
    }
    $today = Carbon::now('Asia/Jakarta')->locale('id','en');
    $today->addDay(1-$halamanaktif, 'days');
    return view('dashboard.nota', [
        
      
        "transaksi" => $transaksi->get(),
        //"tanggal" => date('l', strtotime( '+' . 1-$halamanaktif . ' days' )) .' '. date('d')+1-$halamanaktif,
        "tanggal" => $today->isoFormat('dddd, LL'),
        "halamanaktif" => $halamanaktif
    ]);
})->middleware('auth');

Route::resource('/dashboard/notas', DashboardNotaController::class)->middleware('auth');

Route::resource('/dashboard/hutang', AdminPelangganController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/trips', TripController::class)->middleware('admin');

