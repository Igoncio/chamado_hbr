<?php

use App\Entity\Cliente;

// Obter o cliente com base no ID fornecido via GET
$objcliente = Cliente::getCliente2($_GET['id_cli']);

// Verificar se o formulário foi enviado
if (isset($_POST["codigo"], $_POST["nome"], $_POST["telefone"], $_POST["cnpj"], $_POST["pais"], $_POST["cep"], $_POST["cidade"], $_POST["estado"], $_POST["numero"], $_POST["rua"], $_POST["bairro"], $_POST["obs"])) {

    $objcliente = Cliente::getCliente2($_GET['id_cli']);

    if (!$objcliente) {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
        exit;
    }
    // Preencher os dados do cliente com base nos dados do formulário
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
    
    // Chamar o método de atualização do cliente
    $result = $objcliente->atualizar();

    // Verificar se a atualização foi bem-sucedida
    if ($result) {
        // Redirecionar após a atualização bem-sucedida
        echo '<script>window.location.href = "main_ger_cli.php";</script>';
        exit;
    } else {
        echo "Falha ao atualizar o cliente.";
    }
}
