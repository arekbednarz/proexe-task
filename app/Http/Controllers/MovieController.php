<?php

namespace App\Http\Controllers;

use App\Http\Responses\MovieResponse;
use App\Services\Movie\MovieService;

class MovieController extends Controller
{
    public function __construct(
        protected MovieService $movieService
    ) {}

    public function getTitles(): MovieResponse
    {
        try {
            $titles = $this->movieService->getTitles();
        } catch (\Exception $e) {
            return MovieResponse::error();
        }

        return MovieResponse::ok($titles);
    }
}
