<?php
// Application middleware

$app->add(new \Slim\Csrf\Guard);

/**
* Handles authentification to the admin Back Office
*/
class Auth
{
  public function __invoke($request, $response, $next)
  {
    if (isset($_SESSION['user'])) {
      $response->getBody()->write('connected');
    } else {
      $response->getBody()->write('NOT connected');
    }

    return $next($request, $response);
  }
}
