<?php

namespace App\Services\Movie\Adapters;

use External\Foo\Movies\MovieService;

class FooMovieAdapter implements MovieAdapterInterface
{
    public function __construct(
        protected MovieService $movieService
    ) {}

    public function getTitles(): array
    {
        return $this->movieService->getTitles();
    }
}
