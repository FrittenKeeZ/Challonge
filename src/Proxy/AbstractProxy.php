<?php

namespace Challonge\Proxy;

use Challonge\Adapter\AdapterInterface;

abstract class AbstractProxy
{
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
     * Adapter instance.
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor.
     *
     * @param string $apiKey
     * @param AdapterInterface $adapter
     */
    public function __construct($apiKey, AdapterInterface $adapter)
    {
        $this->apiKey = $apiKey;
        $this->adapter = $adapter;
    }
}
