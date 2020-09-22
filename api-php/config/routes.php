<?php
use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

return function (App $app) {
  // $app->get('/', \App\Action\HomeAction::class);
  // $app->post('/users', \App\Action\UserCreateAction::class);
  $app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/clientes', \App\Action\PruebaAction::class . ':getClientes');
     $group->post('/cliente', \App\Action\PruebaAction::class . ':crear');
  });
  // $app->post('/cliente', \App\Action\PruebaAction::class . ':crear');
  // $app->get('/clientes', \App\Action\PruebaAction::class . ':getClientes');
};
?>