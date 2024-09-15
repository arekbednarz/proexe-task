<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements Responsable
{
    public function __construct(
        public string $status,
        public ?string $token = null,
        public int $code = 200,
    ) {}

    public function toResponse($request): Response
    {
        $data = [
            'status' => $this->status,
        ];

        if ($this->token !== null) {
            $data['token'] = $this->token;
        }

        return new JsonResponse(data: $data);
    }

    public static function ok(string $token)
    {
        return new static(
            status: 'success',
            token: $token,
            code: 200
        );
    }

    public static function error()
    {
        return new static(
            status: 'failure',
            code: 401
        );
    }
}
