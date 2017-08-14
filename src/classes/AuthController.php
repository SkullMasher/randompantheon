<?php
/**
* Handles login attepts
*/
class AuthController
{
  protected $container;

  function __construct($container)
  {
    $this->container = $container;
  }

  public function postLogin($request, $response)
  {
    // $adminName = $request->getParam('adminName');

    $parsedBody = $request->getParsedBody();
    return $response->getBody()->write(print_r($parsedBody));
  }
}
