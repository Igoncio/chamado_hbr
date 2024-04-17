<?php

use App\Entity\Usuario;


$objuser2 = Usuario::getUser($_GET['id_user']);

echo'<pre>'; print_r($objuser2); echo'</pre>';

// if (!isset($_GET['id_user']) || !is_numeric($_GET['id_user']) || $_GET['id_user'] <= 0) {
//     header('Location: main_ger_user.php');
//     exit;
// }

// if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"], $_POST["email"], $_POST["senha"], $_POST["perfil"], $_POST["cliente"])) {
    
    // $objusuario2 = Usuario::getUser($_GET['id_user']);

    // if (!$objusuario2) {
        // Usuário não encontrado
    //     echo "Usuário não encontrado.";
    //     exit;
    // }

    // Atualizar os dados do usuário
    // $objusuario->nome = $_POST["nome"];
    // $objusuario->sobrenome = $_POST["sobrenome"];
    // $objusuario->telefone = $_POST["telefone"];
    // $objusuario->email = $_POST["email"];
    // $objusuario->senha = $_POST["senha"];
    // $objusuario->perfil = $_POST["perfil"];
    // $objusuario->cliente = $_POST["cliente"];

    // $result = $objusuario->atualizar();

    // Verificar se a atualização foi bem-sucedida
    // if ($result) {
    //     // Usando JavaScript para redirecionamento
    //     echo '<script>window.location.href = "main_ger_user.php";</script>';
    //     exit;
    // } else {
    //     echo "Falha ao atualizar o usuário.";
    // }
// }