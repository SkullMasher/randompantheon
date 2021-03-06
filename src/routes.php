<?php
// Routes

$app->get('/', 'HomeController')->setName('home');

$app->group('/admin', function () {
  // /admin
  $this->get('', 'AdminController:getPage')->setName('admin');

  $this->post('', 'AdminController:postData');

  // /admin/
  $this->get('/', function ($request, $response, $args) {
    $this->logger->info(" The fucking '/admin/' route");
    return $response->withRedirect($this->router->pathfor('admin'));
  });
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
