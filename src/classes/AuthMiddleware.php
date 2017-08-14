<?php
/**
* Handles authentification to the admin Back Office
*/
class AuthMiddleware
{
  protected $router;

  public function __construct($router)
  {
      $this->router = $router;
  }

  public function __invoke($request, $response, $next)
  {
    if (isset($_SESSION['user'])) {
      // $response->getBody()->write('connected');
    } else {
      return $response->withRedirect($this->router->pathfor('login'));
      // return $response->getBody()->write(var_dump($this->router->pathfor('login')));
    }

    return $next($request, $response);
  }
}
