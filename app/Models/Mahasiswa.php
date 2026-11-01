<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Sesuaikan dengan nama tabel asli di database Anda

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'alamat',
        // kolom lain jika ada
    ];
}