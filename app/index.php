<?php

$loader = require_once __DIR__ . '/libs/vendor/autoload.php';
$loader->setUseIncludePath(true);

$twig = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($twig, [
    'cache' => 'templates/cache',
    'debug' => getenv('ENV','dev') == 'dev'
]);

echo $twig->render('index.html');
