<?php
use App\Entity\Usuario;


if (!isset($_GET['id_user']) || !is_numeric($_GET['id_user']) || $_GET['id_user'] <= 0) {
    header('Location: main_ger_user.php');
    exit;
}


$objusuario = Usuario::getUser($_GET['id_user']);

if(isset($_POST['excluir'])){

    $objusuario->excluir();
    

    // Verificar se a atualização foi bem-sucedida
    if ($result) {
        // Usando JavaScript para redirecionamento
        echo '<script>window.location.href = "main_ger_user.php";</script>';
        exit;
    } else {
        echo "Falha ao atualizar o usuário.";
    }
}