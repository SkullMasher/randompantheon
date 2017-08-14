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
})->add(new AuthMiddleware($container->get('router')));

// /admin/login
$app->get('/admin/login', function ($request, $response, $args) {
  $this->logger->info(" '/admin/login' route");

  if (isset($_SESSION['user'])) {
    return $response->withRedirect($this->router->pathfor('admin'));
  } 

  return $this->view->render($response, 'login.twig', $args);
})->setName('login');

$app->post('/admin/login', 'AuthController:postLogin');
$app->get('/admin/logout', 'AuthController:getLogout')->setName('logout');
