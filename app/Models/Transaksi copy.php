<?php

namespace App\Models;



class Transaksi 
{
   private static $transaksi = [
        [
            "nama" => "Akmal",
            "tonase" => 1000,
            "harga" => 1550,
            "bayar" => 1550000
        ],
        [
            "nama" => "Bayu",
            "tonase" => 100,
            "harga" => 1550,
            "bayar" => 155000
        ],
        [
            "nama" => "Dodi",
            "tonase" => 500,
            "harga" => 1550,
            "bayar" => 775000
        ]
        ];

    public static function all()
    {
        return collect(self::$transaksi);
    }
    
    public static function find($nama)
    {
          $datatransaksi = static::all();
       return $datatransaksi->firstWhere('nama', $nama);
    }
}