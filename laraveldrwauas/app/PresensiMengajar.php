<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresensiMengajar extends Model
{
    protected $table = 'presensi_mengajar';

    protected $fillable = [
        'id_jadwal_guru','tanggal','jam_mulai','jam_selesai','metode','keterangan'
    ];
}
