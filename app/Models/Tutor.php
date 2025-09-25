<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';
    protected $primaryKey = 'tutor_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['tutor_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'tutor_id', 'tutor_id');
    }
}
