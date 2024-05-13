<?php

use App\Entity\Usuario;
use App\Entity\Cliente;
use App\Entity\Perfil;

$clientes = Cliente::getCliente();
$perfis = Perfil::getPerfil();
$objuser = Usuario::getUser($_GET['id_user']);

// echo '<pre>'; print_r($objuser->cliente); echo'</pre>';

// 


$options = '';

// Verificar se a consulta retornou resultados
if ($clientes and $objuser) {


    // print_r($objuser->cliente);
    // print_r($clientes[$objuser->cliente-1]->nome);
    // Iterar sobre os resultados
    foreach ($clientes as $row_check) {

        $row_check->id_cli;
        $objuser->cliente;

        // Acessar as propriedades do objeto Cliente diretamente
        $options .= '<option class="ops" value="' . $row_check->id_cli . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja clientes encontrados
    $options = '<option value="">Nenhum cliente encontrado</option>';
}


$options_perf = '';

// Verificar se a consulta retornou resultados
if ($perfis and $objuser) {

    // Iterar sobre os resultados
    foreach ($perfis as $row_check) {
        // echo '<pre>'; print_r($c); echo '</pre>';
        // echo '<pre>'; print_r($b); echo '</pre>';
        // Acessar as propriedades do objeto Cliente diretamente
        $options_perf .= '<option class="ops" value="' . $row_check->id_perf . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja clientes encontrados
    $options_perf = '<option value="">Nenhum cliente encontrado</option>';
}


if (!isset($_GET['id_user']) || !is_numeric($_GET['id_user']) || $_GET['id_user'] <= 0) {
    header('Location: main_ger_user.php');
    exit;
}

if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"], $_POST["email"], $_POST["senha"], $_POST["perfil"], $_POST["cliente"], $_POST["status"])) {

    $objusuario = Usuario::getUser($_GET['id_user']);

    if (!$objusuario) {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
        exit;
    }

    // Atualizar os dados do usuário
    $objusuario->nome = $_POST["nome"];
    $objusuario->sobrenome = $_POST["sobrenome"];
    $objusuario->telefone = $_POST["telefone"];
    $objusuario->email = $_POST["email"];
    $objusuario->senha = $_POST["senha"];
    $objusuario->perfil = $_POST["perfil"];
    $objusuario->cliente = $_POST["cliente"];
    $objusuario->status = $_POST["status"];

    $result = $objusuario->atualizar();

    // Verificar se a atualização foi bem-sucedida
    if ($result) {
        // Usando JavaScript para redirecionamento
        echo '<script>window.location.href = "main_ger_user.php";</script>';
        exit;
    } else {
        echo "Falha ao atualizar o usuário.";
    }
}