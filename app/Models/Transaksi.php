<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
