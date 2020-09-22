<?php

namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserRepository;
use App\Exception\ValidationException;
final class UserService
{
  /**
   * @var UserRepository
   */
  private $repository;

  /**
   * The constructor.
   *
   * @param UserCreatorRepository $repository The repository
   */
  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  /**
   * Create a new user.
   *
   * @param array $data The form data
   *
   * @return int The new user ID
   */
  public function CrearCliente(array $data): array
  {
    // Input validation
    $error = $this->validateNewUser($data);
    if (!empty($error)) {
      $resp = $error;
    } else {
      // Insert user
      $userId = $this->repository->Insertar($data);
      $resp = ['mensaje' => 'El usuario ha sido registrado. ' . $userId];
    }
    // Logging here: User created successfully
    //$this->logger->info(sprintf('User created successfully: %s', $userId));
    return $resp;
  }

  public function ListarClientes(): array
  {
    $lista = $this->repository->Listar();
    return $lista;
  }
  /**
   * Input validation.
   *
   * @param array $data The form data
   *
   * @throws ValidationException
   *
   * @return void
   */
  private function validateNewUser(array $data): array
  {
    $errors = [];
    if (empty($data['nombres'])) {
      $errors['nombres'] = 'El nombre no puede ser vacío.';
    }
    if (empty($data['dni'])) {
      $errors['dni'] = 'El DNI no puede ser vacío.';
    }

    // if (empty($data['email'])) {
    //   $errors['email'] = 'Input required';
    // } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
    //   $errors['email'] = 'Invalid email address';
    // }

    // if ($errors) {
    //   throw new ValidationException('Please check your input', $errors);
    // }
    return $errors;
  }
}
?>