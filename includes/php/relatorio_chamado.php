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

$total_chamados_query = "SELECT COUNT(*) AS total_linhas FROM vw_vizualizar_chamado;";
$total_chama = $db->query($total_chamados_query);

if ($total_chama) {
    $row = $total_chama->fetch_assoc();
    $total_linhas = $row['total_linhas'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_chamados_aceitos = "SELECT COUNT(*) AS total_finalizados FROM vw_vizualizar_chamado WHERE status LIKE '%os%';";
$total_aceitos = $db->query($total_chamados_aceitos);

if ($total_aceitos) {
    $row_aceitos = $total_aceitos->fetch_assoc();
    $total_linhas_aceitas = $row_aceitos['total_finalizados'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_chamados_aguardando_query = "SELECT COUNT(*) AS total_aguardando FROM vw_vizualizar_chamado WHERE status = 'nao_visto';";
$total_aguardando = $db->query($total_chamados_aguardando_query);

if ($total_aguardando) {
    $row_aguardando = $total_aguardando->fetch_assoc();
    $total_linhas_aguardando = $row_aguardando['total_aguardando'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_baixa_query = "SELECT COUNT(*) AS total_baixa FROM vw_vizualizar_chamado WHERE prioridade = 'baixa';";
$total_baixa_result = $db->query($total_baixa_query);

if ($total_baixa_result) {
    $row_baixa = $total_baixa_result->fetch_assoc();
    $total_linhas_baixa = $row_baixa['total_baixa'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_media_query = "SELECT COUNT(*) AS total_media FROM vw_vizualizar_chamado WHERE prioridade = 'media';";
$total_media_result = $db->query($total_media_query);

if ($total_media_result) {
    $row_media = $total_media_result->fetch_assoc();
    $total_linhas_media = $row_media['total_media'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_alta_query = "SELECT COUNT(*) AS total_alta FROM vw_vizualizar_chamado WHERE prioridade = 'alta';";
$total_alta_result = $db->query($total_alta_query);

if ($total_alta_result) {
    $row_alta = $total_alta_result->fetch_assoc();
    $total_linhas_alta = $row_alta['total_alta'];
} else {
    echo "Erro ao executar a consulta.";
}


?>

