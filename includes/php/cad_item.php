<?php 

use App\Entity\Item;
use App\Entity\Cliente;
use App\Entity\Setor;
use App\Entity\Categoria;

$setores = Setor::getSetor();
$categorias = Categoria::getCategoria();   
$clientes = Cliente::getCliente();

if (isset($_POST["nome"], $_POST["modelo"], $_POST["id_categoria"], $_POST["apelido"], $_POST["num_patrimonio"], $_POST["num_serie"], $_POST["fabricante"], $_POST["id_cli"], $_POST["id_set"])) {

    $objitem = new Item();

    
    $objitem->nome = $_POST["nome"];
    $objitem->modelo = $_POST["modelo"];
    $objitem->id_categoria = $_POST["id_categoria"];
    $objitem->apelido = $_POST["apelido"];
    $objitem->num_patrimonio = $_POST["num_patrimonio"];
    $objitem->num_serie = $_POST["num_serie"];
    $objitem->fabricante = $_POST["fabricante"];
    $objitem->id_cli = $_POST["id_cli"];
    $objitem->id_set = $_POST["id_set"];
    
    $objitem->cadastrar();

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