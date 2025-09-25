<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran'; // nama tabel sebenarnya
    protected $primaryKey = 'pendaftaran_id'; // sesuaikan jika perlu
    public $timestamps = true; // sesuaikan
    protected $fillable = ['user_id', 'kelas_id', 'status']; // contoh kolom

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'user_id', 'user_id');
        // foreign key di pendaftaran = user_id
        // primary key di siswa = user_id
    }

    // Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'mapel_id');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'pendaftaran_id', 'pendaftaran_id');
    }
}
