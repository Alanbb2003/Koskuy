<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    public $table = "kamar";
    protected $fillable = [
        'jenis_kamar',
        'harga_kamar',
        'jumlah_kamar',
        'luas_kamar',
        'status_kamar',
        'deskripsi_kamar',
        'ac',
        'kmd',
        'wifi',
        'tv',
        'kulkas',
        'gambar_kamar',
        'kos_id'
    ];
}
