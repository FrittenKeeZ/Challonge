<?php

namespace Challonge\Proxy;

use Challonge\Adapter\AdapterInterface;

abstract class AbstractProxy
{
    /**
     * Adapter instance.
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Constructor.
     *
     * @param Challonge\Adapter\AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}
