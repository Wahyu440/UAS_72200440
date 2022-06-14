<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Guru;

class GuruController extends Controller
{
    public function list(){
        $guru = Guru::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $guru
        ], 200);
    }
    public function add(request $req){
        $guru = DB::table('guru')->insert([
            'rfid' => $req->rfid,
            'nip' => $req->nip,
            'nama_guru' => $req->nama_guru,
            'alamat' => $req->alamat,
            'status_guru' => $req->status_guru
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