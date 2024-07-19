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
                <td>" . (!empty($user['status']) ? "não visto" : 'campo vazio') . "</td>
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
            <td>" . (!empty($user['status']) ? "Respondida" : 'campo vazio') . "</td>
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
            <td>" . (!empty($user['status']) ? "Finalizada" : 'campo vazio') . "</td>
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

$sql_respondidos = "SELECT COUNT(*) as total FROM vw_vizualizar_chamado WHERE status LIKE '%os_respondida%'";
$result_respondidos = $db->query($sql_respondidos);

$respondidos = 0;

if ($result_respondidos->num_rows > 0) {
    $row = $result_respondidos->fetch_assoc();
    $respondidos = $row['total'];
}

$sql_naovisto = "SELECT COUNT(*) as total FROM vw_vizualizar_chamado WHERE status LIKE 'os'";
$result_naovisto = $db->query($sql_naovisto);

$naovisto = 0;

if ($result_naovisto->num_rows > 0) {
    $row = $result_naovisto->fetch_assoc();
    $naovisto = $row['total'];
}


$sql_finalizado = "SELECT COUNT(*) as total FROM vw_vizualizar_chamado WHERE status LIKE '%os_finalizada%'";
$result_finalizado = $db->query($sql_finalizado);

$finalizado = 0;

if ($result_finalizado->num_rows > 0) {
    $row = $result_finalizado->fetch_assoc();
    $finalizado = $row['total'];
}



$db->close();
?>

