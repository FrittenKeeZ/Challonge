<?php

namespace Challonge\Adapter;

interface AdapterInterface {

  /**
   * @param Request $request
   *
   * @return Response
   */
  public function request(Request $request);
}
