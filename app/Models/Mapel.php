<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = [
        'nama_mapel',
        'jenjang',
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'mapel_id', 'mapel_id');
    }
}
