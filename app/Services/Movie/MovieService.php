<?php

namespace App\Services\Movie;

use Illuminate\Support\Facades\Cache;

class MovieService
{
    const MAX_RETRIES = 5;
    const TITLES_CACHE_KEY = 'titles';

    public function __construct(
        protected MovieAdapterFactory $movieAdapterFactory
    ) {}

    public function getTitles(): array
    {
        if (Cache::has(self::TITLES_CACHE_KEY)) {
            return Cache::get(self::TITLES_CACHE_KEY);
        }

        $titles = $this->getTitlesFromAdapters();

        Cache::put(self::TITLES_CACHE_KEY, $titles, 60);

        return $titles;
    }

    protected function getTitlesFromAdapters(): array
    {
        $titles = [];

        foreach ($this->movieAdapterFactory->getMovieAdapters() as $adapter) {
            $adapterTitles = retry(self::MAX_RETRIES, function () use ($adapter) {
                return $adapter->getTitles();
            }, 100);

            $titles = array_merge($titles, $adapterTitles);
        }

        return $titles;
    }
}
