<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PresensiMengajar;

class PresensiMengajarController extends Controller
{
    public function list(){
        $presensimengajar = PresensiMengajar::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $presensimengajar
        ], 200);
    }
    public function add(request $req){
        $presensimengajar = DB::table('presensi_mengajar')->insert([
            'id_jadwal_guru' => $req->id_jadwal_guru,
            'tanggal' => $req->tanggal,
            'jam_mulai' => $req->jam_mulai,
            'jam_selesai' => $req->jam_selesai,
            'metode' => $req->metode,
            'keterangan' => $req->keterangan
        ]);
        if($presensimengajar){
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
        $presensimengajar = DB::table('presensi_mengajar')->where('id_presensi_mengajar',$req->id_kelas)->update([
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