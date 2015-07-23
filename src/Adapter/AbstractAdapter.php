<?php

namespace Challonge\Adapter;

abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * Challonge! API URL.
     */
    const API_URL = 'https://api.challonge.com/:api_version/:endpoint.json';

    /**
     * Challonge! API version.
     */
    const API_VERSION = 'v1';

    /**
     * Challonge! API key.
     *
     * @see http://api.challonge.com/v1
     *   For details regarding authentication.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Constructor.
     *
     * @param string $apiKey
     *   Challonge! API key.
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function request($method, $endpoint, array $query, array $post)
    {
        $url = strtr(self::API_URL, [':api_version' => self::API_VERSION, ':endpoint' => $endpoint]);
    }

    public function get($endpoint, array $query)
    {
        return $this->request('GET', $endpoint, $query, []);
    }

    public function post($endpoint, array $post)
    {
        return $this->request('POST', $endpoint, [], $post);
    }

    public function put($endpoint, array $post)
    {
        return $this->request('PUT', $endpoint, [], $post);
    }

    public function delete($endpoint, array $post)
    {
        return $this->request('DELETE', $endpoint, [], $post);
    }

    /**
     * Sends a request through the adapter.
     * The request itself is expected to return a response in JSON format.
     *
     * @param Request $request
     *
     * @throws Exception\AdapterException
     *   If something went wrong with the request.
     *
     * @return Response
     */
    abstract protected function send(Request $request);
}
