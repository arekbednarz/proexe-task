<?php

namespace App\Services\Movie;

use App\Services\Movie\Adapters\BarMovieAdapter;
use App\Services\Movie\Adapters\BazMovieAdapter;
use App\Services\Movie\Adapters\FooMovieAdapter;

class MovieAdapterFactory
{
    public function getMovieAdapters(): array
    {
        return [
            app(FooMovieAdapter::class),
            app(BarMovieAdapter::class),
            app(BazMovieAdapter::class),
        ];
    }
}
