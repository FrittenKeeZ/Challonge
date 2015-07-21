<?php

namespace Challonge;

class API {

  /**
   * API version implementation for this wrapper.
   *
   * @see http://api.challonge.com/v1/documents/changelog
   *   For details regarding changes.
   */
  const VERSION = '1.0.2';

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
   * @param string $apiKey
   *   Challonge! API key.
   */
  public function __construct($apiKey) {
    $this->apiKey = $apiKey;
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
  public function __call($name, array $arguments) {
    if (!property_exists($this, $name) || $name === 'apiKey') {
      throw new \BadMethodCallException('No proxy instance found with the name: ' . $name);
    }

    if (!$this->$name) {
      $class = 'Challonge\\Proxy\\' . ucfirst($name) . 'Proxy';

      $this->$name = new $class($this->apiKey);
    }

    return $this->$name;
  }
}
