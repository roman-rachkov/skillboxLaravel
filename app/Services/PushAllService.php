<?php

namespace App\Services;

use GuzzleHttp\Client;

class PushAllService
{
    const API_PATH = 'https://pushall.ru/api.php';

    protected string $apiKey;
    protected string $apiId;
    protected Client $client;

    public function __construct(string $key, string $id)
    {
        $this->apiKey = $key;
        $this->apiId = $id;
        $this->client = new Client(['base_uri' => self::API_PATH]);
    }

    public function sendMessage(string $text, string $title = 'Новый пост на сайте', $url = null)
    {
        $data = [
            "type" => "self",
            "id" => $this->apiId,
            "key" => $this->apiKey,
            "text" => $text,
            "title" => $title
        ];

        if ($url) {
            $data['url'] = $url;
        }

        return $this->client->post('', ['form_params' => $data]);
    }

}
