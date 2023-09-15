### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Mediapiar\MovieAPI\MovieAPIServiceProvider::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Mediapiar\MovieAPI\MovieAPIServiceProvider"
```

When published, the `config/movieapi.php` config file contains:

```php
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
```

You can change it according to your needs.
