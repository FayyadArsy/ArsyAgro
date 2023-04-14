<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
