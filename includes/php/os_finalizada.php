<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();
$dados_perm = $objUsuario->getPermissao($_SESSION['id_user']);

$cad_cli = $dados_perm->cad_cli == '1';
$cad_perf = $dados_perm->cad_perf == '1';
$cad_chama = $dados_perm->cad_chama == '1';
$cad_equip = $dados_perm->cad_equip == '1';
$cad_user = $dados_perm->cad_user == '1';
$vizu_chama = $dados_perm->vizu_chama == '1';
$todas_os = $dados_perm->todas_os == '1';
$ger_perf = $dados_perm->ger_perf == '1';
$ger_user = $dados_perm->ger_user == '1';
$ger_equip = $dados_perm->ger_equip == '1';
$ger_cli = $dados_perm->ger_cli == '1';
$req_chama = $dados_perm->req_chama == '1';
$aceitar_recusar_chama = $dados_perm->aceitar_recusar_chama == '1';
$edit_chama = $dados_perm->edit_chama == '1';
$relatorio_chama = $dados_perm->relatorio_chama == '1';
$resp_os = $dados_perm->resp_os == '1';
$edit_os = $dados_perm->edit_os == '1';
$relatorio_os = $dados_perm->relatorio_os == '1';

$user_lista = '';
$user_table = '';

foreach ($dados as $user) {
    $card_class = '';
    $notiglow_class = '';
    $notiborderglow_class = '';
    $notititle_class = '';
    $notibody_class = '';

    if ($user['prioridade'] == "baixa" && $user['status'] == "os_finalizada") {
        $card_class = 'card1';
        $notiglow_class = 'notiglow1';
        $notiborderglow_class = 'notiborderglow1';
        $notititle_class = 'notititle1';
        $notibody_class = 'notibody1';
    } elseif ($user['prioridade'] == "media" && $user['status'] == "os_finalizada") {
        $card_class = 'card3';
        $notiglow_class = 'notiglow3';
        $notiborderglow_class = 'notiborderglow3';
        $notititle_class = 'notititle3';
        $notibody_class = 'notibody3';
    } elseif ($user['prioridade'] == "alta" && $user['status'] == "os_finalizada") {
        $card_class = 'card2';
        $notiglow_class = 'notiglow2';
        $notiborderglow_class = 'notiborderglow2';
        $notititle_class = 'notititle2';
        $notibody_class = 'notibody2';
    }

    if ($card_class) {
        $user_lista .= '   
            <div class="' . $card_class . '">
                <div class="' . $notiglow_class . '"></div>
                <div class="' . $notiborderglow_class . '"></div>
                <div class="' . $notititle_class . '">Chamado ' . $user['id_chamado'] . '</div>
                <div class="' . $notibody_class . '">
                    Requisitante: ' . htmlspecialchars($user['nome_solicitante']) . '<br>
                    Abertura: ' . htmlspecialchars($user['abertura']) . '<br><br>
                    Equipamento(s): ' . htmlspecialchars($user['nome_equip']) . '<br>
                    Tipo: ' . htmlspecialchars($user['tipo']) . '<br>
                    Prioridade: ' . htmlspecialchars($user['prioridade']) . '<br><br>
                    Descrição: ' . htmlspecialchars($user['descricao']) . '<br><br>
                    Responsável: ' . htmlspecialchars($user['nome_resp']) . '<br>
                    Cliente: ' . htmlspecialchars($user['nome_cliente']) . '<br><br>
                    Resposta Tec.: '. htmlspecialchars($user['resposta']) . '<br>
                    <a href="../pages/main_vizualizar_os.php?id_chamado=' . htmlspecialchars($user['id_chamado']) . '"><button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Visualizar</button></a>
                </div>
            </div>';
    }

    if ($user['status'] == "os_finalizada") {
        $descricao = !empty($user['descricao']) ? (strlen($user['descricao']) > 140 ? substr($user['descricao'], 0, 140) . '...' : $user['descricao']) : 'campo vazio';

        $user_table .= '
            <tr>
                <td>' . (!empty($user['id_chamado']) ? htmlspecialchars($user['id_chamado']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_solicitante']) ? htmlspecialchars($user['nome_solicitante']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['abertura']) ? htmlspecialchars($user['abertura']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_equip']) ? htmlspecialchars($user['nome_equip']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['tipo']) ? htmlspecialchars($user['tipo']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['prioridade']) ? htmlspecialchars($user['prioridade']) : 'campo vazio') . '</td>
                <td>' . htmlspecialchars($descricao) . '</td>
                <td>' . (!empty($user['nome_resp']) ? htmlspecialchars($user['nome_resp']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_cliente']) ? htmlspecialchars($user['nome_cliente']) : 'campo vazio') . '</td>
                <td>' . (!empty($user['resposta']) ? htmlspecialchars($user['resposta']) : 'campo vazio') . '</td>
                <td>
                    <a href="../pages/main_vizualizar_os.php?id_chamado=' . htmlspecialchars($user['id_chamado']) . '"><button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Visualizar</button></a>
                </td>
            </tr>';
    }
}
?>
