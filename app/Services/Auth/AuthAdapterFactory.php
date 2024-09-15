<?php

namespace App\Services\Auth;

use App\Exceptions\UndefinedLoginAdapterException;
use App\Services\Auth\Adapters\AuthAdapterInterface;
use App\Services\Auth\Adapters\BarAuthAdapter;
use App\Services\Auth\Adapters\BazAuthAdapter;
use App\Services\Auth\Adapters\FooAuthAdapter;

class AuthAdapterFactory
{
    public function getAdapter(string $login): AuthAdapterInterface
    {
        return match (true) {
            str_starts_with($login, 'FOO_') => app(FooAuthAdapter::class),
            str_starts_with($login, 'BAR_') => app(BarAuthAdapter::class),
            str_starts_with($login, 'BAZ_') => app(BazAuthAdapter::class),
            default => throw new UndefinedLoginAdapterException($login),
        };
    }
}
