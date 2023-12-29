<?php

namespace Lamoud\LaravelNelcXapiIntegration;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class XapiIntegration
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function sendXAPIRequest($url, $username, $password, $data = [])
    {
        $client = new Client([
            'auth' => [$username, $password],
        ]);

        $headers = [
            'Content-Type'  => 'application/json',
            'Access-Control-Allow-Origin'   => '*',
        ];

        $options = [
            'json' => $data,
            'headers' => $headers,
        ];

        try {
            $response = $client->post($url, $options);

            return [
                'status' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
                'body' => $response->getBody()->getContents(),
            ];
        } catch (RequestException $e) {
            $response = $e->getResponse();

            return [
                'status' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
                'body' => $response->getBody()->getContents(),
            ];
        }

    }

}