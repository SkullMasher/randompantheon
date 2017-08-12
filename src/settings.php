<?php
return [
  'settings' => [
    'displayErrorDetails' => true, // set to false in production
    'addContentLengthHeader' => false, // Allow the web server to send the content-length header
    // Twig view, templating engine settings
    'view' => [
      'template_path' => __DIR__ . '/../templates/',
    ],
    // Monolog settings
    'logger' => [
      'name' => 'Random-Pantheon',
      'path' => __DIR__ . '/../logs/app.log',
      'level' => \Monolog\Logger::DEBUG,
    ],
  ],
];

return [
  'settgins' => [
    // Database settings, ORM is Eloquent
    'db' => [
      'driver' => 'mysql',
      'host' => '127.0.0.1',
      'database' => 'randompantheon',
      'username' => 'skullmasher',
      'password' => '',
      'charset' => 'utf8_unicode_ci',
      'prefix' => ''
    ],
  ]
];
