<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    // $response->getBody()->write("Hello, $name");
    $response->write("Hello, $name");

    return $response;
});
$app->GET('/student/{cusId}/info', function($request, $response, $args) {
  $cusId = $request->getAttribute('cusId');
  $queryParams = $request->getQueryParams();
  $token = $queryParams['token'];
  $offset = $queryParams['offset'];
  $limit = $queryParams['limit'];
  $response->write("token:$token, $cusId");
  return $response;
});
$app->run();