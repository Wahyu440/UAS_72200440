<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresensiHarian extends Model
{
    protected $table = 'presensi_harian';

    protected $fillable = [
        'tahun_akademik','semester','tanggal','hari','id_guru','jam_masuk','jam_pulang','metode','keterangan'
    ];
}
