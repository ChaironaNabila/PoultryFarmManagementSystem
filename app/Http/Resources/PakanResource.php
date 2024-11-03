<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PakanResource extends JsonResource
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
            'nama_pakan'=>$this->nama_pakan,
            'jenis_pakan'=>$this->jenis_pakan,
            'stok_pakan'=>$this->stok_pakan,
            'tanggal_diperbarui'=>$this->tanggal_diperbarui,
        ];
    }
}
