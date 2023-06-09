<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.trips.index', [
            'transaksi' => Trip::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.trips.create', [
            "title" => "Info Trip",
            "transaksi" => Transaksi::where('trip', 0)->get()
        
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
        $mobil=$request->input('mobil');
        $trucks = $request->input('truk');
        $carId = json_encode($trucks);
        $user_id= auth()->user()->id;
        Trip::create([
        'nota_id' => $carId,
        'mobil' => $mobil,
        'user_id' => $user_id
        ]);
        

        Transaksi::whereIn('id', $trucks)->update(['trip' => true]);
        
 
       
        return redirect('/dashboard/trips')->with('success','Berhasil Menambahkan Nota!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        $userIds = json_decode($trip->nota_id, true); // Convert the string to an array
        $value = Transaksi::whereIn('id', $userIds)->get(); // Get the matching users

        return view('dashboard.trips.show', [
            'datas' => $trip,
            'transaksi' => $value
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        return view('dashboard.trips.edit', [
            'trip' => $trip
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'mobil' => 'required'
        ]);
    
        $trip->update([
            'mobil' => $validatedData['mobil']
        ]);
   
    
    return redirect('/dashboard/trips')->with('success', 'Nota berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        
        Trip::destroy($trip->id);
        return redirect('/dashboard/trips')->with('success','Berhasil Menghapus Nota!');
    }
}
