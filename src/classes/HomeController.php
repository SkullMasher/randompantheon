<?php
/**
*     QZqZD
*/
class HomeController
{
  private $view;
  private $router;
  private $band;
  private $logger;

  function __construct($container)
  {
    $this->router = $container['router'];
    $this->view = $container['view'];
    $this->logger = $container['logger'];
    $this->band = new Band;
  }

  function __invoke($request, $response) {
    // Sample log message
    $this->logger->info(" '/' route");
    $allBands = Band::all()->toArray(); // get the band list
    $randomBand = $allBands[mt_rand(0, count($allBands) - 1)];

    $ViewVariables = [
      'bands' => $allBands,
      'randomBand' => $randomBand
    ];

    // Render index view
    return $this->view->render($response, 'homepage.twig', $ViewVariables);
  }
}
