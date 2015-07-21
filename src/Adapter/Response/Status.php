<?php

namespace Challonge\Adapter\Response;

class Status {

  /**
   * Response code phrases returnable by Challonge API.
   *
   * @see http://api.challonge.com/v1
   *   For explanation of response codes.
   *
   * @var array
   */
  protected $codePhrases = array(
    200 => 'OK',
    401 => 'Unauthorized (Invalid API key or insufficient permissions)',
    404 => 'Object not found within your account scope',
    406 => 'Requested format is not supported - request JSON or XML only',
    422 => 'Validation error(s) for create or update method',
    500 => 'Something went wrong on our end. If you continually receive this, please contact us',
  );

  /**
   * HTTP Status Code.
   *
   * @var int
   */
  protected $code = 200;

  /**
   * Status phrase.
   *
   * @var string
   */
  protected $phrase = 'OK';

  /**
   * Constructor.
   *
   * @param int $code
   *   HTTP status code.
   */
  public function __contruct($code) {
    $code = (int) $code;
    $this->code = $code;
    // Set code phrase if possible.
    if (isset($this->codePhrases[$code])) {
      $this->phrase = $this->codePhrases[$code];
    }
    else {
      $this->phrase = 'Unknown response';
    }
  }

  /**
   * Returns the reponse code.
   *
   * @return int
   */
  public function getCode() {
    return $this->code;
  }

  /**
   * Returns the response phrase.
   *
   * @return string
   */
  public function getPhrase() {
    return $this->phrase;
  }
}
