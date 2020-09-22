<?php

namespace App\Action;
use Psr\Container\ContainerInterface;
use App\Domain\User\Service\UserService;

class PruebaAction
{
  protected $container;
  private $UserService;
  // constructor receives container instance
  public function __construct(ContainerInterface $container, UserService $UserService)
  {
    $this->container = $container;
    $this->UserService = $UserService;
  }

  public function crear($request, $response, $args)
  {
    // your code
    // to access items in the container... $this->container->get('');
    $data = (array) $request->getParsedBody();
    $resp = $this->UserService->CrearCliente($data);

    // Transform the result into the JSON representation
    // $result = [
    //   'resp' => $resp
    // ];
    // Build the HTTP response
    $response->getBody()->write((string) json_encode($resp));

    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(201);
  }

  public function getClientes($request, $response, $args)
  {
    $resp = $this->UserService->ListarClientes();
    // Build the HTTP response
    $response->getBody()->write((string) json_encode($resp));

    return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
  }
}
?>