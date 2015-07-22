<?php

namespace Challonge\Exception;

use Challonge\Adapter\Response;

/**
 * Challonge! exception.
 */
class ChallongeException extends \RuntimeException
{
    /**
     * Response.
     *
     * @var Response
     */
    protected $response;

    /**
     * Constructor.
     *
     * @param Response $response
     * @param \Exception|null $previous
     */
    public function __contruct(Response $response, \Exception $previous = null)
    {
        $status = $response->getStatus();

        parent::__construct($status->getPhrase(), $status->getCode(), $previous);
    }

    /**
     * Returns the response.
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
