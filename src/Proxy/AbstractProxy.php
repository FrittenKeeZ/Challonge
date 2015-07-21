<?php

namespace Challonge\Proxy;

abstract class AbstractProxy {

  protected $apiKey;

  public function __construct($apiKey) {
    $this->apiKey = $apiKey;
  }
}
