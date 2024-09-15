<?php

namespace App\Services\Auth\Adapters;

interface AuthAdapterInterface
{
    public function login(string $login, string $password): bool;
    public function getContext(): string;
}
