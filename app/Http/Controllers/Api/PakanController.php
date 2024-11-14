<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PakanResource;
use App\Models\Pakan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    public function index() {
        $pakans  = Pakan::get();

        if($pakans-> count() > 0 )
        {
            return PakanResource::collection($pakans);

        }
        else
        {
            return response()->json(['message'=>'Tidak ada data pakan'], 200);

        }

    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_pakan' => 'required|string',
            'jenis_pakan' => 'required|string',
            'stok_pakan' => 'required|integer',
            'tanggal_diperbarui' => 'required|date',
        
        ]);
        if($validator->fails()){
            return response()->json([
                'messages'=>'All fields all mandatory',
                'error'=>$validator->messages(),
            ], 422);

        }

        $pakan = Pakan::create([
            'nama_pakan'=> $request->nama_pakan,
            'jenis_pakan'=> $request->jenis_pakan,
            'stok_pakan'=> $request->stok_pakan,
            'tanggal_diperbarui'=>$request->tanggal_diperbarui,
        ]);

        return response()->json([
            'message'=>'Pakan berhasil dibuat',
            'data'=> new PakanResource($pakan)
        ], 200);


    }

    public function show(Pakan $pakan) {

        return new PakanResource($pakan);

    }

    public function update(Request $request, Pakan $pakan) {
        $validator = Validator::make($request->all(), [
            'nama_pakan' => 'required|string',
            'jenis_pakan' => 'required|string',
            'stok_pakan' => 'required|integer',
            'tanggal_diperbarui' => 'required|date',
        
        ]);
        if($validator->fails()){
            return response()->json([
                'messages'=>'All fields all mandatory',
                'error'=>$validator->messages(),
            ], 422);

        }

        $pakan ->update([
            'nama_pakan'=> $request->nama_pakan,
            'jenis_pakan'=> $request->jenis_pakan,
            'stok_pakan'=> $request->stok_pakan,
            'tanggal_diperbarui'=>$request->tanggal_diperbarui,
        ]);

        return response()->json([
            'message'=>'Pakan berhasil diupdate',
            'data'=> new PakanResource($pakan)
        ], 200);

    }

    public function destroy(Pakan $pakan) {
        $pakan->delete();

        return response()->json([
            'message'=>'Pakan berhasil dihapus',
        ], 200);

    }
}
