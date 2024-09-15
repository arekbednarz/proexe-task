<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ExternalUser extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'login',
        'password',
        'context',
    ];

    protected $primaryKey = 'login';


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'login' => $this->login,
            'context' => $this->context,
        ];
    }

    public function getLoginAttribute(): ?string
    {
        return $this->attributes['login'] ?? null;
    }

    public function getPasswordAttribute(): ?string
    {
        return $this->attributes['password'] ?? null;
    }

    public function getContextAttribute(): ?string
    {
        return $this->attributes['context'] ?? null;
    }

    public function setContext(string $context): ?string
    {
        return $this->setAttribute('context', $context);
    }
}
