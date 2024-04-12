<?php 

use App\Entity\Setor;
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


if(isset($_POST["id_cli"], $_POST["nome"],  $_POST["descricao"])) {

    $objsetor = new Setor();

    $objsetor -> id_cli = $_POST["id_cli"];
    $objsetor -> nome = $_POST["nome"];
    $objsetor -> descricao = $_POST["descricao"];
    

    $objsetor -> cadastrar();

}

