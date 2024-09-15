<?php

namespace App\Services\Movie\Adapters;

use External\Bar\Movies\MovieService;

class BarMovieAdapter implements MovieAdapterInterface
{
    public function __construct(
        protected MovieService $movieService
    ) {}

    public function getTitles(): array
    {
        $titles = $this->movieService->getTitles();

        return array_column($titles['titles'], 'title');
    }
}
