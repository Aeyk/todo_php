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

$app->get('/api', function (Request $request, Response $response, $args) {
    $response = $response->withJson(201);
});

$app->get('/api/register', function (Request $request, Response $response, $args) {
    $result = [];
    if(
        !$_POST['username'] || !isset($_POST['username'])
        && !$_POST['password'] || !isset($_POST['password'])
    ) {
        $result = ['status' => 'error', 'message' => 'invalid username or password for new user.'];
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type', 'application/json');
    }

    return $response;
});

$app->run();
