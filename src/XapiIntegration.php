<?php

namespace Lamoud\LaravelNelcXapiIntegration;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Lamoud\LaravelNelcXapiIntegration\Interactions\Registered;

class XapiIntegration
{
    protected $client;
    protected $headers;
    protected $url;
    protected $key;
    protected $secret;

    public function __construct()
    {
        $this->url = config('lamoud-nelc-xapi.endpoint');
        $this->key = config('lamoud-nelc-xapi.key');
        $this->secret = config('lamoud-nelc-xapi.secret');

        $this->client =  new Client([
            'auth' => [$this->key, $this->secret],
        ]);

        $this->headers = [
            'Content-Type'  => 'application/json',
            'Access-Control-Allow-Origin'   => '*',
        ];

    }

    public function Registered( $actor, $actorEmail, $courseId, $courseTitle, $courseDesc, $instructor, $instructorEmail)
    {
        $instance = new Registered();
        $data = $instance->Send( $actor, $actorEmail, $courseId, $courseTitle, $courseDesc, $instructor, $instructorEmail);

        return $this->sendXAPIRequest( $data );
    }

    public function sendXAPIRequest($data = [])
    {

        $options = [
            'json' => $data,
            'headers' => $this->headers,
        ];

        try {
            $response = $this->client->post($this->url, $options);

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