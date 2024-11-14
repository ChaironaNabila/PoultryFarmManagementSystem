<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KandangResource;
use App\Models\Kandang;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class KandangController extends Controller
{
    
    public function index() {
        $kandangs  = Kandang::get();

        if($kandangs-> count() > 0 )
        {
            return KandangResource::collection($kandangs);
        }
        else
        {
            return response()->json(['message'=>'Tidak ada data kandang'], 200);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kode_kandang' => 'required|string',
            'jenis_unggas' => 'required|string',
            'jumlah_unggas' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date',
            'status'=> 'required|string'
        
        ]);
        if($validator->fails()){
            return response()->json([
                'messages'=>'All fields all mandatory',
                'error'=>$validator->messages(),
            ], 422);

        }

        // $tanggal_masuk = Carbon::createFromFormat('d/m/Y', $request->tanggal_masuk)->format('Y-m-d');
        // $tanggal_keluar = $request->tanggal_keluar ? Carbon::createFromFormat('d/m/Y', $request->tanggal_keluar)->format('Y-m-d') : null;

        $kandang = Kandang::create([
            'kode_kandang' => $request->kode_kandang,
            'jenis_unggas' => $request->jenis_unggas,
            'jumlah_unggas' => $request->jumlah_unggas,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status'=> $request->status

        ]);

        return response()->json([
            'message'=>'Kandang berhasil dibuat',
            'data'=> new KandangResource($kandang)
        ], 200);


    }

    public function show(Kandang $kandang) {

        return new KandangResource($kandang);

    }

    public function update(Request $request, Kandang $kandang) {
        $validator = Validator::make($request->all(), [
            'kode_kandang' => 'required|string',
            'jenis_unggas' => 'required|string',
            'jumlah_unggas' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'status'=> 'required|string'

        
        ]);
        if($validator->fails()){
            return response()->json([
                'messages'=>'All fields all mandatory',
                'error'=>$validator->messages(),
            ], 422);

        }

        $kandang ->update([
            'kode_kandang' => $request->kode_kandang,
            'jenis_unggas' => $request->jenis_unggas,
            'jumlah_unggas' => $request->jumlah_unggas,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status'=> $request->status

        ]);

        return response()->json([
            'message'=>'Kandang berhasil diupdate',
            'data'=> new KandangResource($kandang)
        ], 200);

    }

    public function destroy(Kandang $kandang) {
        $kandang->delete();

        return response()->json([
            'message'=>'Kandang berhasil dihapus',
        ], 200);

    }
}
