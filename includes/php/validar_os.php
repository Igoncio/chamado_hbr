<?php

use App\Entity\Chamado;
// use App\Entity\Item;
// use App\Entity\Usuario;
// use App\Entity\Cliente;

// $item = Item::getItem();
// $user = Usuario::getUsuario();
// $cli = Cliente::getCliente();


// echo '<pre>';
// print_r($item);
// echo '</pre>';
// exit;

// Verifica se o parâmetro id_chamado foi passado via GET
if (!isset($_GET['id_chamado'])) {
    die("ID do chamado não foi especificado.");
}

// Obtém os dados do chamado especificado pelo ID
$dadosID = Chamado::getChama3($_GET['id_chamado']);

// Verifica se o chamado foi encontrado
if (!$dadosID) {
    die("Chamado não encontrado.");
}

// Imprime os dados do chamado para depuração
// echo '<pre>';
// print_r($dadosID);
// echo '</pre>';
// exit;


$user_lista = '';

if ($dadosID->prioridade == "baixa") {
    $user_lista .= '
        <div class="card1">
            <div class="notiglow1"></div>
            <div class="notiborderglow1"></div>
            <div class="notititle1">OS  ' . $dadosID->id_chamado . '</div>
            <div class="notibody1">
                Requisitante: ' . $dadosID->nome_solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->nome_equip . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->nome_resp . '<br>
                Cliente: ' . $dadosID->nome_cliente . '<br><br>
                <label>Imagem detalhada:</label> <br>
                <img class="imagem" src="../imgs/chamado/'.$dadosID->imagem.'" alt=""> 

                <form method="POST" action="" class="area-form">
                
                
                    <label id="txt-resp" for="">Responder OS</label>
                    
                    <label class="label" for="desc">Descrição</label>
                    <textarea id="desc" class="input" name="resp_desc" maxlength="250"></textarea>
                    <div id="contador-caracteres">0/250 caracteres</div>

                    
                    <div class="aa">
                        <a href=""><button type="submit" class="btn btn-primary" id="btnValidar">Confirmar</button></a>
                        <a href="../pages/main_editar_chama.php?id_chamado='.$dadosID->id_chamado.'"><button type="button" class="btn btn-dark">Editar</button></a>
                        <button type="button" class="btn btn-danger">Voltar</button>
                    </div>


                </form>
                
                </div>
                </div>
    ';
}

if ($dadosID->prioridade == "media") {
    $user_lista .= '
        <div class="card3">
            <div class="notiglow3"></div>
            <div class="notiborderglow3"></div>
            <div class="notititle3">OS ' . $dadosID->id_chamado . '</div>
            <div class="notibody3">
                Requisitante: ' . $dadosID->nome_solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->nome_equip . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->nome_resp . '<br>
                Cliente: ' . $dadosID->nome_cliente . '<br> 

                <label>Imagem detalhada:</label> <br>
                <img class="imagem" src="../imgs/chamado/'.$dadosID->imagem.'" alt=""> 

                <form method="POST" action="" class="area-form">
                
                
                    <label id="txt-resp" for="">Responder OS</label>
                    
                    <label class="label" for="desc">Descrição</label>
                    <textarea id="desc" class="input" name="resp_desc" maxlength="250"></textarea>
                    <div id="contador-caracteres">0/250 caracteres</div>

                    
                    <div class="aa">
                        <a href=""><button type="submit" class="btn btn-primary" id="btnValidar">Confirmar</button></a>
                        <a href="../pages/main_editar_chama.php?id_chamado='.$dadosID->id_chamado.'"><button type="button" class="btn btn-dark">Editar</button></a>
                        <button type="button" class="btn btn-danger">Voltar</button>
                    </div>


                </form>
                
            </div>
        </div>
    ';
}


if ($dadosID->prioridade == "alta") {
    $user_lista .= '
        <div class="card2">
            <div class="notiglow2"></div>
            <div class="notiborderglow2"></div>
            <div class="notititle2">OS ' . $dadosID->id_chamado . '</div>
            <div class="notibody2">
                Requisitante: ' . $dadosID->nome_solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->nome_equip . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->nome_resp . '<br>
                Cliente: ' . $dadosID->nome_cliente . '<br> 
                
                <label>Imagem detalhada:</label> <br>
                <img class="imagem" src="../imgs/chamado/'.$dadosID->imagem.'" alt=""> 

                <form method="POST" action="" class="area-form">
                
                
                    <label id="txt-resp" for="">Responder OS</label>
                    
                    <label class="label" for="desc">Descrição</label>
                    <textarea id="desc" class="input" name="resp_desc" maxlength="250"></textarea>
                    <div id="contador-caracteres">0/250 caracteres</div>

                    
                    <div class="aa">
                        <a href=""><button type="submit" class="btn btn-primary" id="btnValidar">Confirmar</button></a>
                        <a href="../pages/main_editar_chama.php?id_chamado='.$dadosID->id_chamado.'"><button type="button" class="btn btn-dark">Editar</button></a>
                        <button type="button" class="btn btn-danger">Voltar</button>
                    </div>


                </form>
                
            </div>
        </div>
    ';
}

if (isset($_POST["resp_desc"])) {
    // Criar um novo objeto Chamado
    $objchamado = Chamado::getChama2($_GET['id_chamado']);
    
    
    if (!$objchamado) {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
        exit;
    }


    // Definir as propriedades do chamado com base nos dados do formulário
    $objchamado->resp_desc = $_POST["resp_desc"];
    
    // Atualizar o chamado no banco de dados
   $atualizar_sucesso = $objchamado->ResponderOs();
    
    // print_r();
    // exit;
    // Verificar se a atualização foi bem-sucedida antes de redirecionar
    // print_r($atualizar_sucesso);
    // print_r($objchamado->id_chamado);
    // exit;
    if ($atualizar_sucesso) {
        echo '<script>window.location.href = "main_todas_os.php";</script>';
        exit;
    } else {
        echo "Erro ao atualizar o chamado.";
    }

}

?>
