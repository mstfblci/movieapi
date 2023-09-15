<?php

return [
    'md' => [
        'base_uri' => env('MOVIESDATABASE_RAPIDAPI_BASE_URI', 'https://moviesdatabase.p.rapidapi.com'),

        'headers' => [
            'X-RapidAPI-Host' => env('MOVIESDATABASE_RAPIDAPI_HOST', 'moviesdatabase.p.rapidapi.com'),
            'X-RapidAPI-Key' => env('MOVIESDATABASE_RAPIDAPI_KEY', NULL),
        ]
    ],
    'ams' => [
        'base_uri' => env('ADVANCEDMOVIESEARCH_RAPIDAPI_BASE_URI', 'https://advanced-movie-search.p.rapidapi.com'),

        'headers' => [
            'X-RapidAPI-Host' => env('ADVANCEDMOVIESEARCH_RAPIDAPI_HOST', 'advanced-movie-search.p.rapidapi.com'),
            'X-RapidAPI-Key' => env('ADVANCEDMOVIESEARCH_RAPIDAPI_KEY', NULL),
        ]
    ]
];