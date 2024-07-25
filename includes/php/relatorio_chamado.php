<?php
use App\Entity\Chamado;

$dados = Chamado::getChama();

$user_table = ''; // Inicializa a variável

foreach ($dados as $user) {

if ($user['status'] == "os") {
        $user_table .= "
            <tr>
                <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
                <td>" . (!empty($user['status']) ? "Aceito" : 'campo vazio') . "</td>
            </tr>";
    } 


if ($user['status'] == "os_respondida") {
    $user_table .= "
        <tr>
            <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['status']) ? "Aceito" : 'campo vazio') . "</td>
        </tr>";
} 

if ($user['status'] == "os_finalizada") {
    $user_table .= "
        <tr>
            <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['status']) ? "Aceito" : 'campo vazio') . "</td>
        </tr>";
} 

if ($user['status'] == "nao_visto") {
    $user_table .= "
        <tr>
            <td>" . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . "</td>
            <td>" . (!empty($user['status']) ? "Não Visto" : 'campo vazio') . "</td>
        </tr>";
} 
}

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "chamado_hbr";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error){
    die("Nao funfou: " . $db->connect_error);
}


?>

