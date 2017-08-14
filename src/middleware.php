<?php
$app->add(new CsrfFieldMiddleware($container));
$app->add($container->get('csrf'));
