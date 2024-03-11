<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model

{   
    protected $primaryKey = 'id_keranjang';
    
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_keranjang',
        'id_barang',
        'id_pengguna',
        'qty',
    ];
}
