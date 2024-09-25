<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function generateText($prompt, $maxTokens = 200)
    {        
        try {
        $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',                
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo',  // o gpt-4 si tienes acceso
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],                               
            ]
        ]);
        
        $body = json_decode($response->getBody(), true);

        return $body['choices'][0]['message']['content'] ?? 'No response';
    } catch (\Exception $e) {
        // Maneja el error o registra la excepción
        return 'Error: ' . $e->getMessage();
    }
    }
}