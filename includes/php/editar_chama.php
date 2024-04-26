<?php

use App\Entity\Chamado;
use App\Entity\Cliente;
use App\Entity\Usuario;
use App\Entity\Item;

$clientes = Cliente::getCliente();
$users = Usuario::getUsuario(); 
$itens = Item::getItem();
$objchamado = Chamado::getChama2($_GET['id_chamado']);



// print_r($_GET['id_chamado']);
// echo"<pre>";print_r($objchamado->prioridade);echo"</pre>";
// echo"<pre>";print_r($users[$objchamado->id_user-32]->nome);echo"</pre>";
// exit;
// Verificar se o ID do item está presente e é um número válido

// Verificar se o ID do chamado está presente e é um número válido
function validarIdChamado($id) {
    // Expressão regular para verificar se o ID está no formato Y-M.numero
    $padrao = '/^\d{4}-\d{2}\.\d{4}$/';
    return preg_match($padrao, $id) === 1;
}

// Uso da função para validar o ID passado na URL
if (!isset($_GET['id_chamado']) || !validarIdChamado($_GET['id_chamado'])) {
    header('Location: main_validar_chamado.php');
    exit;
}

// Verificar se o objeto retornado é uma instância de Chamado e não é nulo
if (!$objchamado instanceof Chamado || $objchamado === null) {
    header('Location: main_validar_chama2.php');
    exit;
}

$options_user = '';

// Verificar se a consulta retornou resultados
if ($users) {
    // Iterar sobre os resultados
    foreach ($users as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_user .= '<option class="ops" value="' . $row_check->id_user . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_user = '<option value="">Nenhum cliente encontrado</option>';
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


$options_item = '';

// Verificar se a consulta retornou resultados
if ($itens) {
    // Iterar sobre os resultados
    foreach ($itens as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_item .= '<option class="ops" value="' . $row_check->id_item . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_item = '<option value="">Nenhum cliente encontrado</option>';
}

if (isset($_POST["abertura"], $_POST["fechamento"], $_POST["id_user"], $_POST["id_cli"], $_POST["id_item"], $_POST["descricao"], $_POST["num_patrimonio"], $_POST["num_serie"], $_POST["prioridade"], $_POST["tipo"])) {
    // Criar um novo objeto Chamado
    $objchamado = Chamado::getChama2($_GET['id_chamado']);

    // Definir as propriedades do chamado com base nos dados do formulário
    $objchamado->abertura = $_POST["abertura"];
    $objchamado->fechamento = $_POST["fechamento"];
    $objchamado->id_user = $_POST["id_user"];
    $objchamado->id_cli = $_POST["id_cli"];
    $objchamado->id_item = $_POST["id_item"];
    $objchamado->descricao = $_POST["descricao"];
    $objchamado->num_patrimonio = $_POST["num_patrimonio"];
    $objchamado->num_serie = $_POST["num_serie"];
    $objchamado->prioridade = $_POST["prioridade"];
    $objchamado->tipo = $_POST['tipo'];


    // Atualizar o chamado no banco de dados
    $atualizar_sucesso = $objchamado->atualizar();

    // Verificar se a atualização foi bem-sucedida antes de redirecionar
    print_r($atualizar_sucesso);
    print_r($objchamado);
    exit;
    if ($atualizar_sucesso) {
        header('Location: main_requisicao_chamado.php');
        exit;
    } else {
        echo "Erro ao atualizar o chamado.";
    }
}

