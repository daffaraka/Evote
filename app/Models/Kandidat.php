<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'foto_kandidat',
        'nama_pasangan',
        'pemilihan_id',
        'nama_ketua',
        'nama_wakil',
        'visi',
        'misi',
        'program_kerja',
        'jumlah_suara',
    ];

    public function Pemilihan()
    {
        return $this->belongsTo(Pemilihan::class,'pemilihan_id');
    }

    public function Vote()
    {
        return $this->hasMany(Vote::class);
    }
}
