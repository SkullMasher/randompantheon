<?php
/**
* Handles login attepts
*/
class AuthController
{
  protected $container;
  private $adminName;
  private $adminPassword;

  function __construct($container)
  {
    $this->container = $container;
    $this->adminName = $container['settings']['admin']['username'];
    $this->adminPassword = $container['settings']['admin']['password'];
  }

  public function postLogin($request, $response)
  {
    // $adminName = $request->getParam('adminName');
    // $csrf->validateToken($_POST[$csrfNameKey], $_POST[$csrfValueKey]);
    $parsedBody = $request->getParsedBody();
    return $response->getBody()->write(var_dump($this->adminName));
  }
}
