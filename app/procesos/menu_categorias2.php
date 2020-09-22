<?php
function arboldeSubCategoriasLista2($parent = 0, $user_tree_array = '')
{
  
  $db = new conexionDB();
  $conn = $db->getConexion();
  if (!is_array($user_tree_array))
    $user_tree_array = array();

  $sql = "SELECT id, nombre, padre_id FROM categorias WHERE 1 AND padre_id = $parent and estado = 1 ORDER BY id ASC";
  $query = $conn->prepare($sql);
  
  $query->execute();
  $total = $query->rowCount();

  if ($total > 0) {
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
      // $user_tree_array[] = "<ul  class='level1' style='display:block' id='error'>";
      $user_tree_array[] = "<li><a class='active' href='/productos/seccion/" . $row->id . "'>" . $row->nombre . "</a> <span class='subDropdown plus'></span>";
      $user_tree_array = arboldeSubCategoriasLista2($row->id, $user_tree_array);
      $user_tree_array[] = "</li>";
    }
  }
  return $user_tree_array;
}
function arboldeSubCategoriasLista1($parent = 0, $user_tree_array = '')
{
  
  $db = new conexionDB();
  $conn = $db->getConexion();
  if (!is_array($user_tree_array))
    $user_tree_array = array();

  $sql = "SELECT id, nombre, padre_id FROM categorias WHERE 1 AND padre_id = $parent and estado = 1 ORDER BY id ASC";
  $query = $conn->prepare($sql);
  $query->execute();
  $total = $query->rowCount();

  if ($total > 0) {
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
      $user_tree_array[] = "<li><a href='/productos/categoria/" . $row->id . "'>" . $row->nombre . "</a> <span class='subDropdown plus'></span>"; //es del 1 nivel
      $user_tree_array[] = "<ul  class='level1' style='display:block' id='error'>";
      $user_tree_array = arboldeSubCategoriasLista2($row->id, $user_tree_array);
      // $user_tree_array[] = "</li>";
      $user_tree_array[] = "</ul></li>";
    }
  }
  return $user_tree_array;
}
function arboldeCategoriasLista($parent = 0, $user_tree_array = '')
{
  
  $db = new conexionDB();
  $conn = $db->getConexion();
  if (!is_array($user_tree_array))
    $user_tree_array = array();

  $sql = "SELECT id, nombre, padre_id FROM categorias WHERE 1 AND padre_id = $parent and estado = 1 ORDER BY id ASC";
  $query = $conn->prepare($sql);
  $query->execute();
  $total = $query->rowCount();

  if ($total > 0) {
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
      $user_tree_array[] = "<li><a class='active' href='javascript:void(0);'>" . $row->nombre . "</a> <span class='subDropdown plus'></span>";
      $user_tree_array[] = "<ul  class='level0_415' style='display:minus'>";
      $user_tree_array = arboldeSubCategoriasLista1($row->id, $user_tree_array);
      $user_tree_array[] = "</ul></li>";
    }
  }
  return $user_tree_array;
}
$res = arboldeCategoriasLista();
?>