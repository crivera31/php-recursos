<?php

namespace App\Domain\User\Repository;
use PDO;

/**
 * Repository.
 */
class UserRepository
{
  /**
   * @var PDO The database connection
   */
  private $connection;

  /**
   * Constructor.
   *
   * @param PDO $connection The database connection
   */
  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  /**
   * Insert user row.
   *
   * @param array $user The user
   *
   * @return int The new ID
   */
  public function Insertar(array $user): int
  {
    $row = [
      'DNI' => $user['dni'],
      'Nombres' => $user['nombres']
      // 'last_name' => $user['last_name'],
      // 'email' => $user['email'],
    ];
    $sql = "INSERT INTO persona SET 
                DNI=:DNI, 
                Nombres=:Nombres";

    $this->connection->prepare($sql)->execute($row);
    return (int) $this->connection->lastInsertId();
  }

  public function Listar(): array
  {
    $sql = "SELECT * FROM persona";

    $resultado = $this->connection->query($sql);
    $clientes = $resultado->fetchAll(PDO::FETCH_ASSOC);
    return $clientes;
  }
}
?>