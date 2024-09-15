<?php

namespace App\Services\Auth\Adapters;

use External\Baz\Auth\Authenticator;
use External\Baz\Auth\Responses\Success;

class BazAuthAdapter implements AuthAdapterInterface
{
    const CONTEXT = 'BAZ';

    public function __construct(
        protected Authenticator $authenticator
    ) {}

    public function login(string $login, string $password): bool
    {
        $response = $this->authenticator->auth($login, $password);

        if ($response instanceof Success) {
            return true;
        }

        return false;
    }

    public function getContext(): string
    {
        return self::CONTEXT;
    }
}
