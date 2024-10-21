<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject // Tambahkan JWTSubject
{
    use Notifiable;

    // Aturan untuk atribut yang dapat diisi
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Aturan untuk atribut yang disembunyikan
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Implementasi metode dari JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
