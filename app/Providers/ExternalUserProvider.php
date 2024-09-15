<?php

namespace App\Providers;

use App\Models\ExternalUser;
use App\Services\Auth\AuthService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class ExternalUserProvider implements UserProvider
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function retrieveById($identifier)
    {
        // Implement logic to retrieve user by identifier (e.g., user ID)
    }

    public function retrieveByToken($identifier, $token)
    {
        // Implement logic to retrieve user by identifier and token
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Implement logic to update the remember token (if applicable)
    }

    public function retrieveByCredentials(array $credentials)
    {
        return new ExternalUser([
            'login' => $credentials['login'],
            'password' => $credentials['password'],
        ]);
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $this->authService->login($user);
    }
}
