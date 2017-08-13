<?php
// Routes

$app->get('/', function ($request, $response, $args) {
  // Sample log message
  $this->logger->info(" '/' route");

  // Render index view
  return $this->view->render($response, 'homepage.twig', $args);
});

$app->get('/admin', function ($request, $response, $args) {
  $this->logger->info(" '/admin' route");
  return $this->view->render($response, 'admin.twig', $args);
});
