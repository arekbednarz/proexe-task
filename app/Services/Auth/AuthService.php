<?php

namespace App\Services\Auth;

use App\Models\ExternalUser;

class AuthService
{
    public function __construct(
        protected AuthAdapterFactory $authAdapterFactory
    ) {}

    public function login(ExternalUser $user): bool
    {
        $adapter = $this->authAdapterFactory->getAdapter($user->login);
        $user->setContext($adapter->getContext());

        return $adapter->login($user->login, $user->password);
    }
}
