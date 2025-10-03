<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    protected $primaryKey = 'mapel_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_mapel',
        'jenjang',
    ];
    
    public function kelas()
    {
        return $this->hasMany(KelasPendaftaran::class, 'mapel_id', 'mapel_id');
    }
    public function materi()
    {
        return $this->hasMany(Materi::class, 'mapel_id', 'mapel_id');
    }
}
