<?php

use App\Entity\Chamado;
use App\Entity\Item;
use App\Entity\Usuario;
use App\Entity\Cliente;

$item = Item::getItem();
$user = Usuario::getUsuario();
$cli = Cliente::getCliente();

// Remove um item específico de cada array
unset($item['id_item']);
unset($user['id_user']);
unset($cli['id_cli']);


echo '<pre>';
print_r($item);
echo '</pre>';
exit;

// Verifica se o parâmetro id_chamado foi passado via GET
if (!isset($_GET['id_chamado'])) {
    die("ID do chamado não foi especificado.");
}

// Obtém os dados do chamado especificado pelo ID
$dadosID = Chamado::getChama2($_GET['id_chamado']);

// Verifica se o chamado foi encontrado
if (!$dadosID) {
    die("Chamado não encontrado.");
}

// Imprime os dados do chamado para depuração
// echo '<pre>';
// print_r($dadosID->id_chamado);
// echo '</pre>';


$user_lista = '';

if ($dadosID->prioridade == "baixa") {
    $user_lista .= '
        <div class="card1">
            <div class="notiglow1"></div>
            <div class="notiborderglow1"></div>
            <div class="notititle1">Chamado ' . $dadosID->id_chamado . '</div>
            <div class="notibody1">
                Requisitante: ' . $dadosID->solicitante . '<br>
                Abertura: ' . $dadosID->abertura . '<br><br>
                Equipamento(s): ' . $dadosID->id_item . '<br>
                Tipo: ' . $dadosID->tipo . '<br>
                Prioridade: ' . $dadosID->prioridade . '<br><br>
                Descrição: ' . $dadosID->descricao . '<br><br>
                Responsável: ' . $dadosID->id_user . '<br>
                Cliente: ' . $dadosID->id_cli . '<br> 
                
            </div>
        </div>
    ';
}

?>
