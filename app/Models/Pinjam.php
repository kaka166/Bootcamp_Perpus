<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

date_default_timezone_set('Asia/Jakarta');

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjam';
    protected $fillable = [
        'nama_pinjam',
        'nomor_hp',
        'status',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];
}
