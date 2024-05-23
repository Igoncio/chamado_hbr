<?php

use App\Entity\Chamado;
use App\Entity\Usuario;

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Buscar as informações do usuário no banco de dados usando o ID da sessão
    $objUsuario = Usuario::getUser($_SESSION['id_user']);
}

$dados = Chamado::getChama();

$user_lista = '';
$user_table = '';

foreach ($dados as $user) {

    $isResponsible = $user['id_user'] == $objUsuario->id_user;
    $isSolicitante = $user['solicitante'] == $objUsuario->id_user;

    if (($user['status'] == "os" || $user['status'] == "os_respondida" || $user['status'] == "os_finalizada") && ($isResponsible || $isSolicitante)) {
        $prioridade = strtolower($user['prioridade']);
        $cardClass = "card1";
        $notiGlowClass = "notiglow1";
        $notiBorderGlowClass = "notiborderglow1";
        $notiTitleClass = "notititle1";
        $notiBodyClass = "notibody1";

        if ($prioridade == "media") {
            $cardClass = "card3";
            $notiGlowClass = "notiglow3";
            $notiBorderGlowClass = "notiborderglow3";
            $notiTitleClass = "notititle3";
            $notiBodyClass = "notibody3";
        } elseif ($prioridade == "alta") {
            $cardClass = "card2";
            $notiGlowClass = "notiglow2";
            $notiBorderGlowClass = "notiborderglow2";
            $notiTitleClass = "notititle2";
            $notiBodyClass = "notibody2";
        }

        $user_lista .= '
        <div class="' . $cardClass . '">
            <div class="' . $notiGlowClass . '"></div>
            <div class="' . $notiBorderGlowClass . '"></div>
            <div class="' . $notiTitleClass . '">Chamado ' . $user['id_chamado'] . '</div>
            <div class="' . $notiBodyClass . '">
                Requisitante: ' . $user['nome_solicitante'] . '<br>
                Abertura: ' . $user['abertura'] . '<br><br>
                Equipamento(s): ' . $user['nome_equip'] . '<br>
                Tipo: ' . $user['tipo'] . '<br>
                Prioridade: ' . $user['prioridade'] . '<br><br>
                Descrição: ' . $user['descricao'] . '<br><br>
                Responsável: ' . $user['nome_resp'] . '<br>
                Cliente: ' . $user['nome_cliente'] . '<br>';

        if ($user['status'] == "os") {
            $user_lista .= '
                <a href="../includes/php/aceitar_chamado.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" name="responder" id="btnResponder">Responder</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>';
        } elseif ($user['status'] == "os_respondida") {
            $user_lista .= '
                <a href="../pages/main_visualizar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" name="visualizar" id="btnVisualizar">Visualizar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>';
        } elseif ($user['status'] == "os_finalizada") {
            $user_lista .= '
                <a href="../pages/main_visualizar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" name="visualizar" id="btnVisualizar">Visualizar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>';
        }

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

        if ($user['status'] == "os") {
            $user_table .= '
                <a href="../includes/php/aceitar_chamado.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" name="responder" id="btnResponder">Responder</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>';
        } elseif ($user['status'] == "os_respondida" || $user['status'] == "os_finalizada") {
            $user_table .= '
                <a href="../pages/main_visualizar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" name="visualizar" id="btnVisualizar">Visualizar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>';
        }

        $user_table .= '
            </td>
        </tr>';
    }
}

?>
