<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();
$dados_perm = $objUsuario->getPermissao($_SESSION['id_user']);

// Verifica permissões do usuário
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
    // Para baixa prioridade e status "os"
    if ($user['prioridade'] == "baixa" && $user['status'] == "os") {
        $user_lista .= '
            <div class="card1">
                <div class="notiglow1"></div>
                <div class="notiborderglow1"></div>
                <div class="notititle1">Chamado ' . $user['id_chamado'] . '</div>
                <div class="notibody1">
                    Requisitante: ' . $user['nome_solicitante'] . '<br>
                    Abertura: ' . $user['abertura'] . '<br><br>
                    Equipamento(s): ' . $user['nome_equip'] . '<br>
                    Tipo: ' . $user['tipo'] . '<br>
                    Prioridade: ' . $user['prioridade'] . '<br><br>
                    Descrição: ' . $user['descricao'] . '<br><br>
                    Responsável: ' . $user['nome_resp'] . '<br>
                    Cliente: ' . $user['nome_cliente'] . '<br>';

        if ($resp_os) {
            $user_lista .= '<a href="../pages/main_validar_os.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Responder</button>
                            </a>';
        }

        if ($edit_os) {
            $user_lista .= '<a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-dark">Editar</button>
                            </a>';
        }

        $user_lista .= '</div></div>';
    }

    // Para média prioridade e status "os"
    if ($user['prioridade'] == "media" && $user['status'] == "os") {
        $user_lista .= '
            <div class="card3">
                <div class="notiglow3"></div>
                <div class="notiborderglow3"></div>
                <div class="notititle3">Chamado ' . $user['id_chamado'] . '</div>
                <div class="notibody3">
                    Requisitante: ' . $user['nome_solicitante'] . '<br>
                    Abertura: ' . $user['abertura'] . '<br><br>
                    Equipamento(s): ' . $user['nome_equip'] . '<br>
                    Tipo: ' . $user['tipo'] . '<br>
                    Prioridade: ' . $user['prioridade'] . '<br><br>
                    Descrição: ' . $user['descricao'] . '<br><br>
                    Responsável: ' . $user['nome_resp'] . '<br>
                    Cliente: ' . $user['nome_cliente'] . '<br>';

        if ($resp_os) {
            $user_lista .= '<a href="../pages/main_validar_os.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Responder</button>
                            </a>';
        }

        if ($edit_os) {
            $user_lista .= '<a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-dark">Editar</button>
                            </a>';
        }

        $user_lista .= '</div></div>';
    }

    // Para alta prioridade e status "os"
    if ($user['prioridade'] == "alta" && $user['status'] == "os") {
        $user_lista .= '
            <div class="card2">
                <div class="notiglow2"></div>
                <div class="notiborderglow2"></div>
                <div class="notititle2">Chamado ' . $user['id_chamado'] . '</div>
                <div class="notibody2">
                    Requisitante: ' . $user['nome_solicitante'] . '<br>
                    Abertura: ' . $user['abertura'] . '<br><br>
                    Equipamento(s): ' . $user['nome_equip'] . '<br>
                    Tipo: ' . $user['tipo'] . '<br>
                    Prioridade: ' . $user['prioridade'] . '<br><br>
                    Descrição: ' . $user['descricao'] . '<br><br>
                    Responsável: ' . $user['nome_resp'] . '<br>
                    Cliente: ' . $user['nome_cliente'] . '<br>';

        if ($resp_os) {
            $user_lista .= '<a href="../pages/main_validar_os.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Responder</button>
                            </a>';
        }

        if ($edit_os) {
            $user_lista .= '<a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-dark">Editar</button>
                            </a>';
        }

        $user_lista .= '</div></div>';
    }

    // Construindo a tabela
    if ($user['status'] == "os") {
        // Limita a descrição para 140 caracteres
        $descricao = (!empty($user['descricao']) ? (strlen($user['descricao']) > 140 ? substr($user['descricao'], 0, 140) . '...' : $user['descricao']) : 'campo vazio');

        $user_table .= '
            <tr>
                <td>' . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . '</td>
                <td>' . $descricao . '</td>
                <td>' . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . '</td>
                <td>';

        if ($resp_os) {
            $user_table .= '<a href="../pages/main_validar_os.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-primary" name="responder" id="btnAceitar">Responder</button>
                            </a>';
        }

        if ($edit_os) {
            $user_table .= '<a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                                <button type="button" class="btn btn-dark">Editar</button>
                            </a>';
        }

        $user_table .= '</td></tr>';
    }
}
?>
