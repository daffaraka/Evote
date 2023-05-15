<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nama_pemilihan',
        'deskripsi',
        'status'
    ];

    public function Kandidat()
    {
        return $this->hasMany(Kandidat::class);
    }
    public function Vote()
    {
        return $this->hasMany(Vote::class);
    }
}
