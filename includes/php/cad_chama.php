<?php
use App\Entity\Cliente;
use App\Entity\Chamado;
use App\Entity\Usuario;
use App\Entity\Item;

$clientes = Cliente::getCliente();
$users = Usuario::getUsuario();
$itens = Item::getItem();

if (isset($_SESSION['id_user'])) {
    $idUsuarioLogado = $_SESSION['id_user'];
}

if (isset($_POST["abertura"], $_POST["fechamento"], $_POST["id_user"], $_POST["id_cli"], $_POST["id_item"], $_POST["descricao"], $_POST["num_patrimonio"], $_POST["num_serie"], $_POST["prioridade"], $_POST["tipo"])) {

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
    $objchama->solicitante = $idUsuarioLogado;
    $objchama->tipo = $_POST['tipo'];

    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
        // Realiza o upload da imagem e salva a referência no objeto
        if ($objchama->uploadImagem($_FILES["imagem"])) {
            // Cadastro do chamado
            $cadastro_sucesso = $objchama->cadastrar();
            // Verifica se o cadastro foi bem-sucedido antes de continuar
            if ($cadastro_sucesso) {
                // Exibe o modal de confirmação
                echo '<script>
                    $(document).ready(function() {
                        $("#confirmationModal").modal("show");
                    });
                </script>';
                exit;
            } else {
                echo "Erro ao cadastrar o chamado.";
            }
        } else {
            echo "Erro ao realizar upload da imagem.";
        }
    } else {
        // Cadastro do chamado sem imagem
        $cadastro_sucesso = $objchama->cadastrar();
        // Verifica se o cadastro foi bem-sucedido antes de continuar
        if ($cadastro_sucesso) {
            // Exibe o modal de confirmação
            echo '<script>
            alert("Chamado Cadastrado");
            window.location.href = "../pages/main_tela_inicial.php"; // Substitua pela URL para onde deseja redirecionar
            </script>';

        } else {
            echo "Erro ao cadastrar o chamado.";
        }
    }
}

// Resto do código permanece o mesmo
$options_user = '';

// Verificar se a consulta retornou resultados
if ($users) {
    // Iterar sobre os resultados
    foreach ($users as $row_check) {
        // Verificar se o nome do usuário não é "anonimo"
        if ($row_check->nome !== 'anonimo') {
            // Acessar as propriedades do objeto Cliente diretamente
            $options_user .= '<option class="ops" value="' . $row_check->id_user . '"> ' . $row_check->nome . ' </option>';
        }
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
