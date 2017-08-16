<?php
/**
* Handles login attepts
*/
class AdminController
{
  private $router;
  private $flash;
  private $logger;
  private $view;

  function __construct($container)
  {
    $this->router = $container['router'];
    $this->flash = $container['flash'];
    $this->logger = $container['logger'];
    $this->view = $container['view'];
  }

  public function getPage($request, $response)
  {
    $this->logger->info(" '/admin' route");
    return $this->view->render($response, 'admin.twig');
  }

  public function addBand($request, $response)
  {
    $this->logger->info(" /admin POST");
    $bandName = $request->getParam('bandName');
    $bandLink = $request->getParam('bandLink');
    $successMessage = '<p class="success">(☞ﾟ∀ﾟ)☞ ' . $bandName .' as been added !</p>';

    if (strlen($bandName) > 0 && strlen($bandName) < 255 && strlen($bandLink) > 0 && strlen($bandLink) < 255) {
      // Insert to bands table
      $band = new Band;
      $band->name = $bandName;
      $band->link = $bandName;
      $band->save();

      $this->flash->addMessage('addBandSuccess', $successMessage);
      return $response->withRedirect($this->router->pathfor('admin'));
    }

    $this->flash->addMessage('addBandError', '<p class="error">¯\_ツ_/¯ You failed at adding a band !</p>');
    return $response->withRedirect($this->router->pathfor('admin'));

    // $parsedBody = $request->getParsedBody();
    // return $response->getBody()->write(var_dump($this->adminName));
  }
}
