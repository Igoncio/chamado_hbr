<?php
use App\Entity\Cliente;
use App\Entity\Setor;
use App\Entity\Categoria;
use App\Entity\Chamado;
use App\Entity\Usuario;
use App\Entity\Item;

$clientes = Cliente::getCliente();
$setores = Setor::getSetor();
$categorias = Categoria::getCategoria();   
$users = Usuario::getUsuario(); 
$itens = Item::getItem();


if (isset($_POST["abertura"], $_POST["fechamento"], $_POST["id_user"], $_POST["id_cli"], $_POST["id_item"], $_POST["descricao"], $_POST["num_patrimonio"], $_POST["num_serie"], $_POST["prioridade"])) {
    
    // Cria um novo objeto chamado
    $objchama = new Chamado();

    // Define as propriedades do chamado com base nos dados do formulário
    $objchama->abertura = $_POST["abertura"];
    $objchama->fechamento = $_POST["fechamento"];
    $objchama->id_user = $_POST["id_user"];
    $objchama->id_cli = $_POST["id_cli"];
    $objchama->id_item = $_POST["id_item"];
    $objchama->descricao = $_POST["descricao"];
    $objchama->num_patrimonio = $_POST["num_patrimonio"];
    $objchama->num_serie = $_POST["num_serie"];
    $objchama->prioridade = $_POST["prioridade"];
    

    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
        // Realiza o upload da imagem e salva a referência no objeto
        if ($objchama->uploadImagem($_FILES["imagem"])) {
            // Cadastro do chamado
            $cadastro_sucesso = $objchama->cadastrar();
        } else {
            echo "Erro ao realizar upload da imagem.";
        }
    } else {
        // Cadastro do chamado sem imagem
        $cadastro_sucesso = $objchama->cadastrar();
    
    // Continuar com o cadastro do chamado
    $cadastro_sucesso = $objchama->cadastrar();
    }
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
