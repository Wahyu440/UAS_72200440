<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kelas;

class KelasController extends Controller
{
    public function list(){
        $kelas = Kelas::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $kelas
        ], 200);
    }
    public function add(request $req){
        $kelas = DB::table('kelas')->insert([
            'kelas' => $req->kelas,
            'jurusan' => $req->jurusan,
            'sub' => $req->sub
        ]);
        if($kelas){
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
        $kelas = DB::table('kelas')->where('id_kelas',$req->id_kelas)->update([
            'kelas' => $req->kelas,
            'jurusan' => $req->jurusan,
            'sub' => $req->sub
        ]);
        if($kelas){
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