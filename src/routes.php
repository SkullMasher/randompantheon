<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info(" '/' route");

    // Render index view
    return $this->view->render($response, 'homepage.twig', $args);
  })->setName('home');

$app->get('/admin', function ($request, $response, $args) {
  $this->logger->info(" '/admin' route");
  return $this->view->render($response, 'admin.twig', $args);
})->setName('admin');

$app->get('/admin/login', function ($request, $response, $args) {
  $this->logger->info(" '/admin/login' route");
  return $this->view->render($response, 'login.twig', $args);
})->setName('login');
