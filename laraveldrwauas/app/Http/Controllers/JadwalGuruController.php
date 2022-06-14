<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JadwalGuru;

class JadwalGuruController extends Controller
{
    public function list(){
        $jadwalguru = JadwalGuru::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $jadwalguru
        ], 200);
    }
    public function add(request $req){
        $jadwalguru = DB::table('jadwal_guru')->insert([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'id_guru' => $req->id_guru,
            'hari' => $req->hari,
            'id_kelas' => $req->id_kelas,
            'id_mapel' => $req->id_mapel,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai
        ]);
        if($jadwalguru){
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