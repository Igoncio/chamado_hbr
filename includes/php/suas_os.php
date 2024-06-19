<?php

use App\Entity\Chamado;
use App\Entity\Usuario;

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Buscar as informações do usuário no banco de dados usando o ID da sessão
    $objUsuario = Usuario::getUser($_SESSION['id_user']);
    // Obter permissões do usuário
    $dados = $objUsuario->getPermissao($_SESSION['id_user']);
    $resp_os = $dados->resp_os == '1';
    $edit_os = $dados->edit_os == '1';
}

$dados = Chamado::getChama();

$user_lista = ''; // Inicializa a variável
$user_table = ''; // Inicializa a variável

foreach ($dados as $user) {
    $isResponsible = $user['id_user'] == $objUsuario->id_user;
    $isSolicitante = $user['solicitante'] == $objUsuario->id_user;

    $card_class = '';
    $glow_class = '';
    $border_glow_class = '';
    $title_class = '';
    $body_class = '';

    // Define classes based on priority
    if ($user['prioridade'] == "baixa") {
        $card_class = 'card1';
        $glow_class = 'notiglow1';
        $border_glow_class = 'notiborderglow1';
        $title_class = 'notititle1';
        $body_class = 'notibody1';
    } elseif ($user['prioridade'] == "media") {
        $card_class = 'card3';
        $glow_class = 'notiglow3';
        $border_glow_class = 'notiborderglow3';
        $title_class = 'notititle3';
        $body_class = 'notibody3';
    } elseif ($user['prioridade'] == "alta") {
        $card_class = 'card2';
        $glow_class = 'notiglow2';
        $border_glow_class = 'notiborderglow2';
        $title_class = 'notititle2';
        $body_class = 'notibody2';
    }

    // Check status and add content based on status type
    if ($user['status'] == "os") {
        $action_url = 'main_validar_os.php?id_chamado';
        $action_url = 'main_vizualizar_os.php?id_chamado';
        // Add content for "os" status
        $user_lista .= "
            <div class=\"$card_class\">
                <div class=\"$glow_class\"></div>
                <div class=\"$border_glow_class\"></div>
                <div class=\"$title_class\">Chamado {$user['id_chamado']}</div>
                <div class=\"$body_class\">
                    Status: Aguardando Resposta<br>
                    Requisitante: {$user['nome_solicitante']}<br>
                    Abertura: {$user['abertura']}<br><br>
                    Equipamento(s): {$user['nome_equip']}<br>
                    Tipo: {$user['tipo']}<br>
                    Prioridade: {$user['prioridade']}<br><br>
                    Descrição: {$user['descricao']}<br><br>
                    Responsável: {$user['nome_resp']}<br>
                    Cliente: {$user['nome_cliente']}<br>";

    } elseif ($user['status'] == "os_respondida") {
        $action_url = 'main_validar_os.php?id_chamado';
        $action_url = 'main_vizualizar_os.php?id_chamado';
        // Add content for "os_respondida" status
        $user_lista .= "
            <div class=\"$card_class\">
                <div class=\"$glow_class\"></div>
                <div class=\"$border_glow_class\"></div>
                <div class=\"$title_class\">Chamado {$user['id_chamado']}</div>
                <div class=\"$body_class\">
                    Status: Os Respondida<br>
                    Requisitante: {$user['nome_solicitante']}<br>
                    Abertura: {$user['abertura']}<br><br>
                    Equipamento(s): {$user['nome_equip']}<br>
                    Tipo: {$user['tipo']}<br>
                    Prioridade: {$user['prioridade']}<br><br>
                    Descrição: {$user['descricao']}<br><br>
                    Responsável: {$user['nome_resp']}<br>
                    Cliente: {$user['nome_cliente']}<br>";

    } elseif ($user['status'] == "os_finalizada") {
        $action_url = 'main_vizualizar_os.php?id_chamado';
         // Ajuste da URL
        // Add content for "os_finalizada" status
        $user_lista .= "
            <div class=\"$card_class\">
                <div class=\"$glow_class\"></div>
                <div class=\"$border_glow_class\"></div>
                <div class=\"$title_class\">Chamado {$user['id_chamado']}</div>
                <div class=\"$body_class\">
                    Status: Os Finalizada<br>
                    Requisitante: {$user['nome_solicitante']}<br>
                    Abertura: {$user['abertura']}<br><br>
                    Equipamento(s): {$user['nome_equip']}<br>
                    Tipo: {$user['tipo']}<br>
                    Prioridade: {$user['prioridade']}<br><br>
                    Descrição: {$user['descricao']}<br><br>
                    Responsável: {$user['nome_resp']}<br>
                    Cliente: {$user['nome_cliente']}<br>";
    }

    // Add common content for all status types
    if ($resp_os) {
        $user_lista .= "<a href=\"$action_url={$user['id_chamado']}\" class=\"btn btn-primary\">Responder</a>"; // Example button
    } else {
        $user_lista .= "<a href=\"$action_url={$user['id_chamado']}\" class=\"btn btn-primary\">Vizualizar</a>"; // Example button
    }
    $user_lista .= "</div></div>";

    // Add rows to table
    if (($user['status'] == "os") && ($isResponsible || $isSolicitante)) {
        $descricao = (!empty($user['descricao']) ? (strlen($user['descricao']) > 140 ? substr($user['descricao'], 0, 140) . '...' : $user['descricao']) : 'campo vazio');

        $user_table .= "
            <tr>
                <td>Aguardando Resposta</td>
                <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
                <td>$descricao</td>
                <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
                <td>";

        if ($edit_os) {
            $user_table .= "<a href=\"../pages/main_editar_chama.php?id_chamado={$user['id_chamado']}\"><button type=\"button\" class=\"btn btn-dark\">Editar</button></a>";
        }

        $user_table .= "</td></tr>";
    }
    
    if ($user['status'] == "os_finalizada" && ($isResponsible || $isSolicitante)) {
        $descricao = (!empty($user['descricao']) ? (strlen($user['descricao']) > 140 ? substr($user['descricao'], 0, 140) . '...' : $user['descricao']) : 'campo vazio');
    
        $user_table .= "
            <tr>
                <td>Os Finalizada</td>
                <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
                <td>$descricao</td>
                <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
                <td>";
    
        $user_table .= "<a href=\"../pages/main_vizualizar_os.php?id_chamado={$user['id_chamado']}\"><button type=\"button\" class=\"btn btn-primary\" name=\"responder\" id=\"btnAceitar\">Vizualizar</button></a>";
    
        $user_table .= "</td></tr>";
    }
    
}
?>
