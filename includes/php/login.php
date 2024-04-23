<?php
session_start();

use App\Entity\Usuario;

require "vendor/autoload.php";


// Verificar se o formulário de login foi enviado
if (isset($_POST['email'], $_POST['senha'])) {
    $objUser = new Usuario();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Configurar dados do usuário para login
    $objUser->email = $email;
    $objUser->senha = $senha;
    // echo'<pre>';print_r($objUser);echo'</pre>';
    // exit;

    if ($objUser->logar()) {
        $_SESSION['msg'] = 'Logado com sucesso!';
        header("Location: pages/main_tela_inicial.php");
        exit;
    } else {
        // Mensagem de usuário ou senha inválidos
        echo'senha ou email invalido';
        // header("Location: index.php?erro=credenciais_incorretas");
        exit;
    }
}
