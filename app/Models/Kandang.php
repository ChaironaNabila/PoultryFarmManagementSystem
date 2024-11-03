<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    use HasFactory;
    
    // public $timestamps = false;

    protected $table = 'kandangs';

    protected $fillable = [
        'kode_kandang',
        'jenis_unggas',
        'jumlah_unggas',
        'tanggal_masuk',
        'tanggal_keluar',
        'status'
    ];
}
