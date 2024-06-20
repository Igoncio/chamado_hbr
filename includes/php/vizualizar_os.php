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
            <div class="notititle1">OS ' . $dadosID->id_chamado . '</div>
            <div class="notibody1">';
                
    if($dadosID->status == "os"){
        $user_lista .= 'Status: Aguardando Resposta<br>';

    }

    if($dadosID->status == "os_respondida"){
        $user_lista .= 'Status: Os Respondida<br>';
    }

    if($dadosID->status == "os_finalizada"){
        $user_lista .= 'Status: Os Finalizada<br>';
    }

    $user_lista.='
                Requisitante: ' . $dadosID->nome_solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->nome_equip . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->nome_resp . '<br>
                Cliente: ' . $dadosID->nome_cliente . '<br><br>
                Resposta Técnica: ' . $dadosID->resposta . '<br>  
                <button  onclick="window.print()">Imprimir</button>
            </div>
        </div>';
    
}

if ($dadosID->prioridade == "media") {
    $user_lista .= '
        <div class="card1">
            <div class="notiglow1"></div>
            <div class="notiborderglow1"></div>
            <div class="notititle1">OS ' . $dadosID->id_chamado . '</div>
            <div class="notibody1">';
                
    if($dadosID->status == "os"){
        $user_lista .= 'Status: Aguardando Resposta<br>';

    }

    if($dadosID->status == "os_respondida"){
        $user_lista .= 'Status: Os Respondida<br>';
    }

    if($dadosID->status == "os_finalizada"){
        $user_lista .= 'Status: Os Finalizada<br>';
    }
    
    $user_lista.='
                Requisitante: ' . $dadosID->nome_solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->nome_equip . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->nome_resp . '<br>
                Cliente: ' . $dadosID->nome_cliente . '<br><br>
                Resposta Técnica: ' . $dadosID->resposta . '<br>  
                <button  onclick="window.print()">Imprimir</button>
            </div>
        </div>';
    
}


if ($dadosID->prioridade == "alta") {
    $user_lista .= '
    <div class="card1">
        <div class="notiglow1"></div>
        <div class="notiborderglow1"></div>
        <div class="notititle1">OS ' . $dadosID->id_chamado . '</div>
        <div class="notibody1">';
            
if($dadosID->status == "os"){
    $user_lista .= 'Status: Aguardando Resposta<br>';

}

if($dadosID->status == "os_respondida"){
    $user_lista .= 'Status: Os Respondida<br>';
}

if($dadosID->status == "os_finalizada"){
    $user_lista .= 'Status: Os Finalizada<br>';
}

$user_lista.='
            Requisitante: ' . $dadosID->nome_solicitante . '<br>
            Abertura: ' . $dadosID->abertura . '<br><br>
            Equipamento(s): ' . $dadosID->nome_equip . '<br>
            Tipo: ' . $dadosID->tipo . '<br>
            Prioridade: ' . $dadosID->prioridade . '<br><br>
            Descrição: ' . $dadosID->descricao . '<br><br>
            Responsável: ' . $dadosID->nome_resp . '<br>
            Cliente: ' . $dadosID->nome_cliente . '<br><br>
            Resposta Técnica: ' . $dadosID->resposta . '<br>  
            <button  onclick="window.print()">Imprimir</button>
        </div>
    </div>';

}

?>