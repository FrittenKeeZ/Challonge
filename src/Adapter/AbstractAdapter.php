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

    /**
     * Send a request through the adapter.
     *
     * @param string $method
     *   HTTP method.
     * @param string $endpoint
     *   API endpoint.
     * @param array  $query
     *   Query parameters.
     * @param array  $post
     *   Post parameters.
     *
     * @throws \UnexpectedValueException
     *   If an unexpected response type is returned from the adapter.
     *
     * @return Response
     */
    public function request($method, $endpoint, array $query, array $post)
    {
        // Format endpoint URL.
        $url = strtr(self::API_URL, array(
            ':api_version' => self::API_VERSION,
            ':endpoint' => $endpoint,
        ));

        // Construct Request with API key added to query.
        $request = new Request($method, ['api_key' => $this->apiKey] + $query, $post, $url);

        // Send request through adapter.
        $response = $this->send($request);

        // Ensure a proper response is returned from the adapter.
        if (!($response instanceof Response)) {
            $responseType = is_object($response) ? get_class($responseType) : gettype($response);

            throw new \UnexpectedValueException('Expected response of type Challonge\\Adapter\\Reponse, got: ' . $responseType);
        }

        return $response;
    }

    /**
     * Send a GET request through the adapter.
     *
     * @see AbstractAdapter::request()
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $query
     *   Query parameters.
     *
     * @return Response
     */
    public function get($endpoint, array $query)
    {
        return $this->request('GET', $endpoint, $query, []);
    }

    /**
     * Send a POST request through the adapter.
     *
     * @see AbstractAdapter::request()
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
    public function post($endpoint, array $post)
    {
        return $this->request('POST', $endpoint, [], $post);
    }

    /**
     * Send a PUT request through the adapter.
     *
     * @see AbstractAdapter::request()
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
    public function put($endpoint, array $post)
    {
        return $this->request('PUT', $endpoint, [], $post);
    }

    /**
     * Send a DELETE request through the adapter.
     *
     * @see AbstractAdapter::request()
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
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
