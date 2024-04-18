<?php 

use App\Entity\Item;
use App\Entity\Cliente;
use App\Entity\Setor;
use App\Entity\Categoria;

$setores = Setor::getSetor();
$categorias = Categoria::getCategoria();   
$clientes = Cliente::getCliente();
$objitens = Item::getEquip2($_GET['id_item']);

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

if (!isset($_GET['id_item']) || !is_numeric($_GET['id_item']) || $_GET['id_item'] <= 0) {
    header('Location: main_ger_equip.php');
    exit;
}
// echo '<pre>'; print_r($objitens); echo'</pre>';

if (isset($_POST["nome"], $_POST["modelo"], $_POST["id_categoria"], $_POST["apelido"], $_POST["num_patrimonio"], $_POST["num_serie"], $_POST["fabricante"], $_POST["id_cli"], $_POST["id_set"])) {

    $objitens = Item::getEquip2($_GET['id_item']);

    if (!$objitens) {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
        exit;
    }

  
    $objitens->nome = $_POST["nome"];
    $objitens->modelo = $_POST["modelo"];
    $objitens->id_categoria = $_POST["id_categoria"];
    $objitens->apelido = $_POST["apelido"];
    $objitens->num_patrimonio = $_POST["num_patrimonio"];
    $objitens->num_serie = $_POST["num_serie"];
    $objitens->fabricante = $_POST["fabricante"];
    $objitens->id_cli = $_POST["id_cli"];
    $objitens->id_set = $_POST["id_set"];
    
    $result = $objitens->atualizar();

    // Verificar se a atualização foi bem-sucedida
    if ($result) {
        // Usando JavaScript para redirecionamento
        echo '<script>window.location.href = "main_ger_equip.php";</script>';
        exit;
    } else {
        echo "Falha ao atualizar o usuário.";
    }
}
