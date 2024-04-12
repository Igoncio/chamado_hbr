<?php

use App\Entity\Usuario;
use App\Entity\Cliente;
$clientes = Cliente::getCliente();


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


if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"], $_POST["email"], $_POST["cpf"], $_POST["senha"], $_POST["cliente"])) {

    $objusuario = new Usuario();

    $objusuario -> nome = $_POST["nome"];
    $objusuario -> sobrenome = $_POST["sobrenome"];
    $objusuario -> telefone = $_POST["telefone"];
    $objusuario -> email = $_POST["email"];
    $objusuario -> cpf = $_POST["cpf"];
    $objusuario -> senha = $_POST["senha"];
    $objusuario -> cliente = $_POST["cliente"];

    $objusuario -> cadastrar();

}

