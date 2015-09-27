<?php

namespace Challonge\Adapter;

interface AdapterInterface
{
    /**
     * Send a GET request through the adapter.
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $query
     *   Query parameters.
     *
     * @return Response
     */
    public function get($endpoint, array $query);

    /**
     * Send a POST request through the adapter.
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
    public function post($endpoint, array $post);

    /**
     * Send a PUT request through the adapter.
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
    public function put($endpoint, array $post);

    /**
     * Send a DELETE request through the adapter.
     *
     * @param string $endpoint
     *   API endpoint.
     * @param array  $post
     *   Post parameters.
     *
     * @return Response
     */
    public function delete($endpoint, array $post);
}
