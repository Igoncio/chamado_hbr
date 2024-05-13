<?php

use App\Entity\Usuario;


$objuser = Usuario::getUser($_GET['id_user']);

if (!isset($_GET['id_user']) or !is_numeric($_GET['id_user'])) {
  echo '<script>window.location.href = "main_ger_user.php";</script>';
  exit;
}

//CONSULTA A VAGA
$objuser = Usuario::getUser($_GET['id_user']);

//VALIDAÇÃO DA VAGA
if (!$objuser instanceof Usuario) {
  echo '<script>window.location.href = "main_ger_user.php";</script>';
  exit;
}

//VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {

  $objuser->excluir();

  echo '<script>window.location.href = "main_ger_user.php";</script>';
  exit;
}




