<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_barang',
        'jumlah',
        'keterangan',
        'harga_barang',
        'id_kategori',
    ];
}


