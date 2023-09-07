<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class AdminPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('admin'); //kalau gak pake middlde ware bisa paaki gate
        return view('dashboard.pelanggan.index', [
            'pelanggan' => Pelanggan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $hutang)
    {
        return view('dashboard.pelanggan.show', [
            'datapelanggan' => $hutang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $hutang)
    {
        return view('dashboard.pelanggan.edit', [
            'pelanggan' => $hutang
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $hutang)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nohp' => 'required',
            'hutang' => 'integer'
        ]);
        Pelanggan::where('id', $hutang->id)->update($validatedData); 
        return redirect('/dashboard/hutang')->with('success','Berhasil Merubah Nota!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }

    public function catatanHutang(Pelanggan $pelanggan)
    {
        
        return view('dashboard.pelanggan.show', [
            'transaksi' => $pelanggan->transaksi->load('pelanggan','admin'),
        ]);
    }
}
