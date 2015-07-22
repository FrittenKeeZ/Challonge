<?php

namespace Challonge\Adapter;

interface AdapterInterface
{
    /**
     * Sends a request through the adapter.
     *
     * @param Request $request
     *
     * @throws Exception\AdapterException
     *   If something went wrong with the request.
     *
     * @return Response
     */
    public function request(Request $request);
}
