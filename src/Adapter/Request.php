<?php

namespace Challonge\Adapter;

class Request {

  /**
   * HTTP method.
   *
   * @var string
   */
  protected $method;

  /**
   * Array of $_GET values.
   *
   * @var array
   */
  protected $query;

  /**
   * Array of $_POST values.
   *
   * @var array
   */
  protected $post;

  /**
   * HTTP URL.
   *
   * @var string
   */
  protected $url;

  /**
   * Constructor.
   *
   * @param string $method
   * @param array $query
   * @param array $post
   * @param string $url
   */
  public function __construct($method, array $query, array $post, $url) {
    $this->method = $method;
    $this->query = $query;
    $this->post = $post;
    $this->url = $url;
  }

  /**
   * Read-only access to properties.
   *
   * @param string $key
   *   The name of the property to read.
   *
   * @return mixed
   *   The property.
   */
  public function __get($key) {
    return $this->$key;
  }
}
