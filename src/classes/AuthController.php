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
    // $csrf->validateToken($_POST[$csrfNameKey], $_POST[$csrfValueKey]);
    $parsedBody = $request->getParsedBody();
    return $response->getBody()->write(print_r($parsedBody));
  }
}
