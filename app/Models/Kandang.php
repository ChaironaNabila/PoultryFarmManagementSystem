<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    use HasFactory;


    protected $fillable = [
        'kode',
        'jenis_unggas',
        'jumlah_unggas',
        'status',
    ];

     protected $casts = [
        'deactivated_at' => 'datetime',
    ];

    public function isActive()
    {
        return $this->deactivated_at === null;
    }
}
