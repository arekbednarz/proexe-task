<?php

namespace App\Services\Auth\Adapters;

use External\Foo\Auth\AuthWS;
use External\Foo\Exceptions\AuthenticationFailedException;

class FooAuthAdapter implements AuthAdapterInterface
{
    const CONTEXT = 'FOO';

    public function __construct(
        protected AuthWS $authWS
    ) {}

    public function login(string $login, string $password): bool
    {
        try {
            $this->authWS->authenticate($login, $password);
        } catch (AuthenticationFailedException $e) {
            return false;
        }

        return true;
    }

    public function getContext(): string
    {
        return self::CONTEXT;
    }
}
