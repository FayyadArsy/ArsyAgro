<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaksi $nota)
    {
        $transaksi = Transaksi::with(['admin', 'pelanggan'])->where('user_id', auth()->user()->id)
        ->latest()
        ->paginate(50);
        return view('dashboard.notas.index', [
            'transaksi' => $transaksi,
            'datapelanggan' => $nota 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.notas.create', [
            'pelanggans' => Pelanggan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $result_explode = explode('|', $request->pelanggan_id);
        $validatedData = $request->validate([
            'nama' => 'required|alpha',
            'tonase' => 'required|integer',
            'harga' => 'required|integer|min:500',
            'potongan'=> 'integer',
            'pelanggan_id' => 'required'
            
        ]);
        $validatedData['user_id']= auth()->user()->id;
        Transaksi::create($validatedData);
        Pelanggan::where('id', $request->pelanggan_id)->decrement('hutang', $request->potongan); 
       
        return redirect('/dashboard/notas')->with('success','Berhasil Menambahkan Nota!');
    }
    public function print(Transaksi $nota)
{
   
    return view('dashboard.notas.show', [
        'datapelanggan' => $nota 
    ]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $nota)
    
    {
        return view('dashboard.notas.show', [
            
            'datapelanggan' => $nota 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $nota)
    {
        return view('dashboard.notas.edit', [
            'nota' => $nota,
            'pelanggans' => Pelanggan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $nota)
    {
        
        if ($request->has('trip')) {
            $transaksi = Transaksi::findOrFail($nota->id);
            $transaksi->trip = $request->input('trip');
            $transaksi->save();

            $trip = Trip::findOrFail($request->id);
           
            $data = json_decode($trip->nota_id);
       
            $key = array_search($nota->id, $data);
            if ($key !== false) {
                unset($data[$key]);
                $trip->nota_id = json_encode(array_values($data));
                $trip->save();
            }


            return back()->with('success', 'Berhasil');
       } 
        $validatedData = $request->validate([
            'nama' => 'required',
            'tonase' => 'required|integer',
            'potongan' => 'integer',
            'harga' => 'required|integer|min:500',
            'pelanggan_id' => 'required'
            
        ]);
        
        $validatedData['user_id']= auth()->user()->id;
        //$validatedData['potongan']= ($request->tonase * $request->harga);
        Transaksi::where('id', $nota->id)->update($validatedData);
    
        Pelanggan::where('id', $request->pelanggan_id)->decrement('hutang', $validatedData['potongan']-$request->potonganasli);
        return redirect('/dashboard/notas')->with('success','Berhasil Merubah Nota/Hutang!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $nota)
    {
        Pelanggan::where('id', $nota->pelanggan_id)->increment('hutang', $nota->potongan);
        Transaksi::destroy($nota->id);
        return redirect('/dashboard/notas')->with('success','Berhasil Menghapus Nota!');
    }
}
