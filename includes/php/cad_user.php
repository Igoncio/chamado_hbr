<?php

use App\Entity\Usuario;
use App\Entity\Cliente;
use App\Entity\Perfil;

$clientes = Cliente::getCliente();
$perfis = Perfil::getPerfil();


$options = '';

// Verificar se a consulta retornou resultados
if ($clientes) {
    // Iterar sobre os resultados
    foreach ($clientes as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options .= '<option class="ops" value="' . $row_check->id_cli . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja clientes encontrados
    $options = '<option value="">Nenhum cliente encontrado</option>';
}


$options_perf = '';

// Verificar se a consulta retornou resultados
if ($perfis) {
    // Iterar sobre os resultados
    foreach ($perfis as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_perf .= '<option class="ops" value="' . $row_check->id_perf . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja clientes encontrados
    $options_perf = '<option value="">Nenhum cliente encontrado</option>';
}


if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"], $_POST["email"], $_POST["senha"], $_POST["perfil"], $_POST["cliente"], $_POST["status"])) {

    $objusuario = new Usuario();

    $objusuario -> nome = $_POST["nome"];
    $objusuario -> sobrenome = $_POST["sobrenome"];
    $objusuario -> telefone = $_POST["telefone"];
    $objusuario -> email = $_POST["email"];
    $objusuario -> senha = $_POST["senha"];
    $objusuario -> perfil = $_POST["perfil"];
    $objusuario -> cliente = $_POST["cliente"];
    $objusuario -> status = $_POST["status"];

    $objusuario -> cadastrar();

}

