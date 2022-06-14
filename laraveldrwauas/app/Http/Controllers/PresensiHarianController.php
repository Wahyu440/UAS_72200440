<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PresensiHarian;

class PresensiHarianController extends Controller
{
    public function list(){
        $presensiharian = PresensiHarian::all();
        return response()->json([
            'success' => true,
            'message' => 'Show Success',
            'data' => $presensiharian
        ], 200);
    }
    public function add(request $req){
        $presensiharian = DB::table('presensi_harian')->insert([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'tanggal' => $req->tanggal,
            'hari' => $req->hari,
            'id_guru' => $req->id_guru,
            'jam_masuk' => $req->jam_masuk,
            'jam_pulang' => $req->jam_pulang,
            'metode' => $req->metode,
            'keterangan' => $req->keterangan
        ]);
        if($presensiharian){
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
        $presensiharian = DB::table('presensi_harian')->where('id_presensi_harian',$req->id_presensi_harian)->update([
            'tahun_akademik' => $req->tahun_akademik,
            'semester' => $req->semester,
            'tanggal' => $req->tanggal,
            'hari' => $req->hari,
            'id_guru' => $req->id_guru,
            'jam_masuk' => $req->jam_masuk,
            'jam_pulang' => $req->jam_pulang,
            'metode' => $req->metode,
            'keterangan' => $req->keterangan
        ]);
        if($presensiharian){
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