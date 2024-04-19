<?php

use App\Entity\Cliente;

// Obter a lista de clientes
$clientes = Cliente::getCliente();


if (isset($_POST["codigo"], $_POST["nome"], $_POST["telefone"], $_POST["cnpj"], $_POST["pais"], $_POST["cep"], $_POST["cidade"], $_POST["estado"], $_POST["numero"], $_POST["rua"], $_POST["bairro"], $_POST["obs"])) {

    $objcliente = new Cliente();

    
    $objcliente->codigo = $_POST["codigo"];
    $objcliente->nome = $_POST["nome"];
    $objcliente->telefone = $_POST["telefone"];
    $objcliente->cnpj = $_POST["cnpj"];
    $objcliente->pais = $_POST["pais"];
    $objcliente->cep = $_POST["cep"];
    $objcliente->cidade = $_POST["cidade"];
    $objcliente->estado = $_POST["estado"];
    $objcliente->numero = $_POST["numero"];
    $objcliente->rua = $_POST["rua"];
    $objcliente->bairro = $_POST["bairro"];
    $objcliente->observacao = $_POST["obs"];
    

    $objcliente->cadastrar();

}