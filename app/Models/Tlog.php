<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tlog extends Model
{
    use HasFactory;

    // Tambahkan properti fillable
    protected $fillable = [
        'tanggal',
        'jam',
        'keterangan',
    ];
}
