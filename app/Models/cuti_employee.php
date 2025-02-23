<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cuti_employee extends Model
{
    protected $table = 'cuti_employee';

    protected $fillable = [
        'nip',
        'karyawan',
        'tanggal_cuti',
        'lama_cuti',
        'keterangan'
    ];
}
