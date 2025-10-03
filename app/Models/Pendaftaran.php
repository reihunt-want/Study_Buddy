<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran'; // nama tabel sebenarnya
    protected $primaryKey = 'daftar_id'; // sesuaikan jika perlu
    public $timestamps = true; // sesuaikan
    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'status',
        'tanggal_daftar',
        'durasi',
        'transaksi_id',
    ]; // contoh kolom

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id', 'user_id');
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
        return $this->hasOne(Transaksi::class, 'pendaftaran_id', 'daftar_id');
    }

    public function kelas()
    {
        return $this->belongsTo(KelasPendaftaran::class, 'kelas_id', 'kelas_id');
    }
}
