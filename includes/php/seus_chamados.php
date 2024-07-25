<?php

use App\Entity\Chamado;
use App\Entity\Usuario;

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Buscar as informações do usuário no banco de dados usando o ID da sessão
    $objUsuario = Usuario::getUser($_SESSION['id_user']);
}

$dados = Chamado::getChama();
$perm = $objUsuario->getPermissao($_SESSION['id_user']);
$user_lista = '';
$user_table = '';

$aceitar_recusar_chama = $perm->aceitar_recusar_chama == '1';
$edit_chama = $perm->edit_chama == '1';

foreach ($dados as $user) {
    // Condições para verificar a prioridade, status e id do usuário
    if ($user['status'] == "nao_visto") {
        $cardClass = '';
        $glowClass = '';
        $borderGlowClass = '';
        $titleClass = '';
        
        // Definir classes CSS com base na prioridade
        switch ($user['prioridade']) {
            case 'baixa':
                $cardClass = 'card1';
                $glowClass = 'notiglow1';
                $borderGlowClass = 'notiborderglow1';
                $titleClass = 'notititle1';
                break;
            case 'media':
                $cardClass = 'card3';
                $glowClass = 'notiglow3';
                $borderGlowClass = 'notiborderglow3';
                $titleClass = 'notititle3';
                break;
            case 'alta':
                $cardClass = 'card2';
                $glowClass = 'notiglow2';
                $borderGlowClass = 'notiborderglow2';
                $titleClass = 'notititle2';
                break;
        }

        // Verificar se o usuário é o solicitante ou responsável
        if ($user['id_user'] == $objUsuario->id_user || $user['solicitante'] == $objUsuario->id_user) {
            $user_lista .= '
                <div class="' . $cardClass . '">
                    <div class="' . $glowClass . '"></div>
                    <div class="' . $borderGlowClass . '"></div>
                    <div class="' . $titleClass . '">Chamado ' . $user['id_chamado'] . '</div>
                    <div class="notibody1">
                        Requisitante: ' . $user['nome_solicitante'] . '<br>
                        Abertura: ' . $user['abertura'] . '<br><br>
                        Equipamento(s): ' . $user['nome_equip'] . '<br>
                        Tipo: ' . $user['tipo'] . '<br>
                        Prioridade: ' . $user['prioridade'] . '<br><br>
                        Descrição: ' . $user['descricao'] . '<br><br>
                        Responsável: ' . $user['nome_resp'] . '<br>
                        Cliente: ' . $user['nome_cliente'] . '<br>';
            
            // Adicionar botão Aceitar se permitido
            if ($aceitar_recusar_chama) {
                $user_lista .= '
                        <a href="../includes/php/aceitar_chamado.php?id_chamado=' . $user['id_chamado'] . '">
                            <button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button>
                        </a>
                        <button type="button" class="btn btn-danger">Desativar</button>
                        ';
            }

            // Adicionar botão Editar se permitido
            if ($edit_chama) {
                $user_lista .= '
                        <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                            <button type="button" class="btn btn-dark">Editar</button>
                        </a>';
            }

            // Adicionar botão Desativar
            $user_lista .= '
                    </div>
                </div>';

            // Limitar a descrição para 140 caracteres
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

            // Adicionar botão Aceitar se permitido
            if ($aceitar_recusar_chama) {
                $user_table .= '
                        <a href="../includes/php/aceitar_chamado.php?id_chamado=' . $user['id_chamado'] . '">
                            <button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button>
                        </a>';
            }

            // Adicionar botão Editar se permitido
            if ($edit_chama) {
                $user_table .= '
                        <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '">
                            <button type="button" class="btn btn-dark">Editar</button>
                        </a>';
            }

            // Adicionar botão Desativar
            if ($aceitar_recusar_chama) {
            $user_table .= '
                        <button type="button" class="btn btn-danger">Desativar</button>
                    </td>
                </tr>';
            }
        }
    }
}

// Restante do código

?>
