<?php

namespace App;

use GuzzleHttp\Client;
class Bot {
    private Client $client;
    public function __construct () {
        $this->client = new Client([
            'base_uri'=>"https://api.telegram.org/bot" . $_ENV['TG2_TOKEN'] . "/"
        ]);
    }
    public function makeRequest (string $method, array $params): void
    {
        $this->client->post($method, ['json' => $params]);
    }
}