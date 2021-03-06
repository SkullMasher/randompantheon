<?php

// Go edit these file !
require 'admin.php'; // Admin portal credential
require 'database.php'; // database settings to get band list & stuff

// Slim Framework settings no need to modify
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
    'db' => $databaseSettings,
    'admin' => $adminCredentials,
  ],
];
