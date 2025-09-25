<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel
     */
    protected $table = 'users';

    /**
     * Primary key custom (user_id)
     */
    protected $primaryKey = 'user_id';
    public $incrementing = false;   // karena bukan auto increment
    protected $keyType = 'string';  // karena user_id berupa string (S001, T001, A001)

    /**
     * Kolom yang boleh diisi
     */
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'password',
        'role',
        'jenis_kelamin',
        'no_whatsapp',
        'tanggal_lahir',
    ];

    /**
     * Hidden (tidak ditampilkan saat toArray/toJson)
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Casting otomatis
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function tutor()
    {
    return $this->hasOne(Tutor::class, 'user_id', 'user_id');
    }

    public function isTutor()
{
    return Str::startsWith($this->user_id, 'T');
}

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id', 'user_id');
    }


    /**
     * Generate user_id otomatis sesuai role
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (!$user->user_id) {
                // prefix berdasarkan role
                $prefix = match ($user->role) {
                    'siswa' => 'S',
                    'tutor' => 'T',
                    'admin' => 'A',
                    default => 'U',
                };

                // cari user terakhir sesuai role
                $lastUser = self::where('role', $user->role)
                                ->orderBy('user_id', 'desc')
                                ->first();

                if ($lastUser) {
                    $lastNumber = (int) substr($lastUser->user_id, 1);
                    $newNumber  = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                } else {
                    $newNumber  = '001';
                }

                $user->user_id = $prefix . $newNumber;
            }
        });
    }
}
