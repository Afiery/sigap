<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhatsAppService
{
    private $apiKey;
    private $client;
    private $url;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->apiKey = 'e08bee57cbd0603bde1a5d49a90d7b23';
        $this->url = 'https://serverdinkes.pegasus-kokanue.ts.net/message/sendText/DINKES';
    }

    public function sendMessage($number, $text)
    {
        $client = new Client([
            'verify' => false, // Untuk bypass SSL jika diperlukan
            'timeout' => 30,
        ]);

        // Struktur JSON payload
        $payload = [
            'number' => $number,
            'text' => $text,
        ];

        try {
            $response = $client->post($this->url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'apikey' => $this->apiKey,
                ],
                'json' => $payload,
            ]);

            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return 'Error: ' . $response->getStatusCode();
            }
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan error
            return 'Error: ' . $e->getMessage();
        }
    }
}