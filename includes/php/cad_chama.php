<?php

use App\Entity\Cliente;
use App\Entity\Setor;
use App\Entity\Categoria;
use App\Entity\Chamado;

$clientes = Cliente::getCliente();
$setores = Setor::getSetor();
$categorias = Categoria::getCategoria();   

if (isset($_POST["abertura"], $_POST["fechamento"], $_POST["id_cli"], $_POST["id_set"], $_POST["id_cat"], $_POST["id_user"], $_POST["descricao"], $_POST["num_serie"], $_POST["prioridade"])) {

    $objchama = new Chamado();

    
    $objchama->abertura = $_POST["abertura"];
    $objchama->fechamento = $_POST["fechamento"];
    $objchama->id_cli = $_POST["id_cli"];
    $objchama->id_set = $_POST["id_set"];
    $objchama->id_cat = $_POST["id_cat"];
    $objchama->id_user = $_POST["id_user"];
    $objchama->descricao = $_POST["descricao"];
    $objchama->num_patrimonio = $_POST["num_patrimonio"];
    $objchama->num_serie = $_POST["num_serie"];
    $objchama->prioridade = $_POST["prioridade"];
    
    $objchama->cadastrar();

}



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



$options_setor = '';

// Verificar se a consulta retornou resultados
if ($setores) {
    // Iterar sobre os resultados
    foreach ($setores as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_setor .= '<option class="ops" value="' . $row_check->id_set . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_setor = '<option value="">Nenhum cliente encontrado</option>';
}



$options_categoria = '';

// Verificar se a consulta retornou resultados
if ($categorias) {
    // Iterar sobre os resultados
    foreach ($categorias as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_categoria .= '<option class="ops" value="' . $row_check->id_categoria . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_categoria = '<option value="">Nenhum cliente encontrado</option>';
}