<?php

namespace Challonge\Adapter;

class Response {

  /**
   * Response status.
   *
   * @var Response\Status
   */
  protected $status;

  /**
   * Response content.
   *
   * @var array
   */
  protected $content;

  /**
   * Constructor.
   *
   * @param Response\Status $status
   * @param array $content
   */
  public function __construct(Response\Status $status, array $content) {
    $this->status = $status;
    $this->content = $content;
  }

  /**
   * Returns the response status.
   *
   * @return Response\Status
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * Returns the response content;
   *
   * @return array
   */
  public function getContent() {
    return $this->content;
  }
}
