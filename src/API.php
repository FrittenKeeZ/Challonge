<?php

namespace Challonge;

class API
{
    /**
     * API version implementation for this wrapper.
     *
     * @see http://api.challonge.com/v1/documents/changelog
     *   For details regarding changes.
     */
    const VERSION = '1.0.2';

    /**
     * Adapter instance.
     *
     * @var Adapter\AdapterInterface
     */
    protected $adapter;

    /**
     * Tournament proxy instance.
     *
     * @var Proxy/Tournament
     */
    protected $tournament;

    /**
     * Participant proxy instance.
     *
     * @var Proxy/Participant
     */
    protected $participant;

    /**
     * Match proxy instance.
     *
     * @var Proxy/Match
     */
    protected $match;

    /**
     * MatchAttachment proxy instance.
     *
     * @var Proxy/MatchAttachment
     */
    protected $matchAttachment;

    /**
     * Constructor.
     *
     * @param Adapter\AdapterInterface|string $arg
     *   Adapter instance or an API key, which will default to a CurlAdapter.
     */
    public function __construct($arg)
    {
        $adapter = null;
        if (is_string($arg)) {
            $adapter = new Adapter\CurlAdapter($arg);
        } elseif ($arg instanceof Adapter\AdapterInterface) {
            $adapter = $arg;
        }

        if ($adapter === null) {
            throw new \InvalidArgumentException('Argument must be an API key or an adapter instance');
        }

        $this->adapter = $adapter;
    }

    /**
     * Caller for proxy instances.
     *
     * @param string $name
     *   Resource name.
     * @param array $arguments
     *
     * @throws \BadMethodCallException
     *   If no proxy instance exist for the specified resource.
     *
     * @return Proxy\AbstactProxy
     *   Proxy instance for the specific resource.
     */
    public function __call($name, array $arguments)
    {
        if (!property_exists($this, $name) || strtolower($name) === 'adapter') {
            throw new \BadMethodCallException('No proxy instance found with the name: ' . $name);
        }

        if (!$this->$name) {
            $class = 'Challonge\\Proxy\\' . ucfirst($name) . 'Proxy';

            $this->$name = new $class($this->adapter);
        }

        return $this->$name;
    }
}
