<?php

namespace App\Services\Auth\Adapters;

use External\Bar\Auth\LoginService;

class BarAuthAdapter implements AuthAdapterInterface
{
    const CONTEXT = 'BAR';

    public function __construct(
        protected LoginService $loginService
    ) {}

    public function login(string $login, string $password): bool
    {
        return $this->loginService->login($login, $password);
    }

    public function getContext(): string
    {
        return self::CONTEXT;
    }
}
