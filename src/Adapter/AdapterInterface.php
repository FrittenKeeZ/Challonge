<?php

namespace Challonge\Adapter;

interface AdapterInterface
{
    public function get($endpoint, array $query);

    public function post($endpoint, array $post);

    public function put($endpoint, array $post);

    public function delete($endpoint, array $post);
}
