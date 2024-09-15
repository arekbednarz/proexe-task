<?php

namespace App\Exceptions;

class UndefinedLoginAdapterException extends \Exception
{
    public function __construct(string $login)
    {
        parent::__construct("Undefined login adapter for login: $login");
    }
}
