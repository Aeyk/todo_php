<?php

# set_include_path(get_include_path().":"."/var/www/html/vendor/");
require '/opt/app/vendor/autoload.php'; // TODO(malik): put this into an env var

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/register', function (Request $request, Response $response, $args) {
    $response->getBody()->write("REGISTER");
    return $response;
});

$app->run();
