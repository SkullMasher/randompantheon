<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info(" '/' route");

    // Render index view
    return $this->view->render($response, 'homepage.twig', $args);
  })->setName('home');

$app->group('/admin', function () {
  // /admin
  $this->get('', function ($request, $response, $args) {
    $this->logger->info(" '/admin' route");
    return $this->view->render($response, 'admin.twig', $args);
  })->setName('admin');
})->add(new Auth($container->get('router')));

// /admin/login
$app->get('/admin/login', function ($request, $response, $args) {
  
  $this->logger->info(" '/admin/login' route");

  // Generating token for CSRF
  $nameKey = $this->csrf->getTokenNameKey();
  $valueKey = $this->csrf->getTokenValueKey();
  $name = $request->getAttribute($nameKey);
  $value = $request->getAttribute($valueKey);

  $tokenArray = [
      $nameKey => $name,
      $valueKey => $value
  ];

  return $this->view->render($response, 'login.twig', $args);
})->setName('login')->add(new CsrfField($container));

$app->post('/admin/login', 'AuthController:postLogin');
