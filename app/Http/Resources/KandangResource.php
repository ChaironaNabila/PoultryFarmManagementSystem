<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KandangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return[
            'id'=>$this->id,
            'kode_kandang'=>$this->kode_kandang,
            'jenis_unggas'=>$this->jenis_unggas,
            'jumlah_unggas'=>$this->jumlah_unggas,
            'tanggal_masuk'=>$this->tanggal_masuk,
            'tanggal_keluar'=>$this->tanggal_keluar,
        ];
    }
}
