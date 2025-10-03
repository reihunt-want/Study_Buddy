<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'kelas_pendaftaran';
    protected $primaryKey = 'kelas_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'mapel_id',
        'jenjang',
        'deskripsi',
        'harga',
        'jadwal_id',
    ];

    // Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'mapel_id');
    }

    // Relasi ke Jadwal
    public function jadwal()
    {
        return $this->belongsTo(JadwalSesi::class, 'jadwal_id', 'jadwal_id');
    }

    // Relasi ke Pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'kelas_id', 'kelas_id');
    }
}
