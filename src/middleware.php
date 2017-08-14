<?php
/**
* Handles authentification to the admin Back Office
*/
class Auth
{
  protected $router;

  public function __construct($router)
  {
      $this->router = $router;
  }

  public function __invoke($request, $response, $next)
  {
    if (isset($_SESSION['user'])) {
      $response->getBody()->write('connected');
    } else {
      return $response->withRedirect($this->router->pathfor('login'));
      // return $response->getBody()->write(var_dump($this->router->pathfor('login')));
    }

    return $next($request, $response);
  }
}

/**
* Handles authentification to the admin Back Office
*/
class CsrfField
{
  protected $csrf;
  protected $view;

  public function __construct($container)
  {
      $this->csrf = $container['csrf'];
      $this->view = $container['view'];
  }

  public function __invoke($request, $response, $next)
  {
    $this->view->getEnvironment()->addGlobal('csrf', [
      'field' => '<input type="hidden" name="' . $this->csrf->getTokenNameKey() . '" value="' . $this->csrf->getTokenName() . '"><input type="hidden" name="' . $this->csrf->getTokenValueKey() . '" value="' . $this->csrf->getTokenValue() . '">'
    ]);

    // $response->getBody()->write('debug :');

    return $next($request, $response);
  }
}
