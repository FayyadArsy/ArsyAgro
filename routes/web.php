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
    $today = Carbon::now('Asia/Jakarta')->locale('id','en');
    return view('home', [
        "tanggal" => $today->isoFormat('dddd D'),
        "bulan" => $today->isoFormat('M')
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
    $transaksi = Transaksi::with(['admin', 'pelanggan'])
        ->where('trip', 1) // Mengambil data hanya jika 'trip' memiliki nilai 0
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan 'created_at' dari yang terbaru
        ->get();
    return view('dashboard.index', [
        "tanggal" => $today->isoFormat('dddd, LL'),
        "transaksi" => $transaksi,
    ]);
})->middleware('auth');

Route::get('dashboard/nota', function(){
    $halamanaktif = (request('page')) ?? 1;
    $today = Carbon::now('Asia/Jakarta')->locale('id', 'en');
    $today->addDay(1 - $halamanaktif, 'days');
    
    $transaksi = Transaksi::with(['admin', 'pelanggan'])
        ->whereDate('created_at', $today->toDateString());
    
    return view('dashboard.nota', [
        "transaksi" => $transaksi->get(),
        "tanggal" => $today->isoFormat('dddd, LL'),
        "halamanaktif" => $halamanaktif
    ]);
})->middleware('auth');

Route::resource('/dashboard/notas', DashboardNotaController::class)->middleware('auth');
Route::get('dashboard/notas/{id}', [DashboardNotaController::class, 'print'])->name('printNota');;


Route::resource('/dashboard/hutang', AdminPelangganController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/trips', TripController::class)->middleware('admin');

