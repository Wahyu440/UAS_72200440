<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mapel;

class MapelController extends Controller
{
    public function list(){
        $mapel = Mapel::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $mapel
        ], 200);
    }
    public function add(request $req){
        $mapel = DB::table('mapel')->insert([
            'nama_mapel' => $req->nama_mapel,
            'deskripsi' => $req->deskripsi
        ]);
        if($mapel){
            return response()->json([
                'success' => true,
                'message' => 'Add Success',
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Add Failed',
            ], 401);
        }
    }
    public function edit(request $req){
        $mapel = DB::table('mapel')->where('id_mapel',$req->id_mapel)->update([
            'nama_mapel' => $req->nama_mapel,
            'deskripsi' => $req->deskripsi
        ]);
        if($mapel){
            return response()->json([
                'success' => true,
                'message' => 'Update Success',
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'message' => 'Update Failed',
            ], 400);
        }
    }
}