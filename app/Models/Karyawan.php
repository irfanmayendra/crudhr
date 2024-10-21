<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Sesuaikan dengan nama kolom di tabel
    protected $fillable = [
        'nama',  // Ganti name dengan nama
        'tgl_lahir',
        'gaji',
    ];
}
