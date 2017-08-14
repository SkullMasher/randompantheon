<?php
/**
* Handles login attepts
*/
class AuthController
{
  protected $container;
  protected $router;
  protected $flash;
  private $adminName;
  private $adminPassword;

  function __construct($container)
  {
    $this->container = $container;
    $this->router = $container['router'];
    $this->flash = $container['flash'];
    $this->adminName = $container['settings']['admin']['username'];
    $this->adminPassword = $container['settings']['admin']['password'];
  }

  public function postLogin($request, $response)
  {
 
    if ($this->adminName === $postAdminName && $this->adminPassword === $postAdminPassword) {
      $_SESSION['user'] = $postAdminName;
      return $response->withRedirect($this->router->pathfor('admin'));
    } else {
      $shrugFace = '¯\_ツ_/¯';
      $errorMessage = 'Wrong username or password. Try again.';
      $this->flash->addMessage('loginerror', $shrugFace);
      $this->flash->addMessage('loginerror', $errorMessage);
      return $response->withRedirect($this->router->pathfor('login'));
    }
    // $parsedBody = $request->getParsedBody();
    // return $response->getBody()->write(var_dump($this->adminName));
  }
}
