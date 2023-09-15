<?php

namespace Mediapiar\MovieAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MovieAPIService
{
    protected Client $client;

    public function __construct(string $base_uri, array $headers = [], int $timeout = 30)
    {
        $this->client = new Client([
            'base_uri' => $base_uri,
            'headers' => $headers,
            'timeout' => $timeout
        ]);
    }

    public function request(string $method, string $endpoint, array $options = [])
    {
        try {
            $response = $this->client->request($method, $endpoint, $options);

            return [
                'code' => $response->getStatusCode(),
                'content' => (array) json_decode($response->getBody()->getContents()),
            ];
        } catch (RequestException $error) {
            return [
                'code' => $error->getCode(),
                'message' => $error->getMessage()
            ];    
        }
    }
}