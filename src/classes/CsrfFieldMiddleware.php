<?php
/**
* Handles authentification to the admin Back Office
*/
class CsrfFieldMiddleWare
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
    $csrfNameKey = $this->csrf->getTokenNameKey();
    $csrfValueKey = $this->csrf->getTokenValueKey();
    $csrfName = $this->csrf->getTokenName();
    $csrfValue = $this->csrf->getTokenValue();

    $this->view->getEnvironment()->addGlobal('csrf', [
      'field' => '<input type="hidden" name="' . $csrfNameKey . '" value="' . $csrfName . '"><input type="hidden" name="' . $csrfValueKey . '" value="' . $csrfValue . '">'
    ]);

    return $next($request, $response);
  }
}
