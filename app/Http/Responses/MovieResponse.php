<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MovieResponse implements Responsable
{
    public function __construct(
        public ?string $status,
        public ?array $titles = [],
        public int $code = 200,
    ) {}

    public function toResponse($request): Response
    {
        $data = [];

        if ($this->status !== null) {
            $data['status'] = $this->status;
        }

        if ($this->titles !== null) {
            $data = $this->titles;
        }

        return new JsonResponse(data: $data);
    }

    public static function ok(array $titles)
    {
        return new static(
            status: null,
            titles: $titles,
            code: 200
        );
    }

    public static function error()
    {
        return new static(
            status: 'failure',
            code: 400
        );
    }
}
