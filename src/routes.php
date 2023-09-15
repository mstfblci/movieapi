<?php

use Mediapiar\MovieAPI\MovieAPIService;
use Mediapiar\MovieAPI\Controllers\{
    MoviesDatabaseController,
    AdvancedMovieSearchController
};

Route::prefix('movies')->group(function() {
    Route::get('moviesdatabase', [MoviesDatabaseController::class, 'search']);
    Route::get('advanced-movie-search', [AdvancedMovieSearchController::class, 'search']);
});