<?php

namespace App\Services\Movie\Adapters;

use External\Baz\Movies\MovieService;

class BazMovieAdapter implements MovieAdapterInterface
{
    public function __construct(
        protected MovieService $movieService
    ) {}

    public function getTitles(): array
    {
        return $this->movieService->getTitles()['titles'];
    }
}
