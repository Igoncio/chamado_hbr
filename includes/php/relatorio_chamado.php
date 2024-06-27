<?php
use App\Entity\Chamado;

$dados = Chamado::getChama();

$user_table = ''; // Inicializa a variável

foreach ($dados as $user) {

if ($user['status'] == "os" || $user['status'] == "os_respondida" || $user['status'] == "os_finalizada" || $user['status'] == "nao_visto") {
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
                <td>" . (!empty($user['status']) ? $user['status'] : 'campo vazio') . "</td>
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

$sql_aceitos = "SELECT COUNT(*) as total FROM vw_vizualizar_chamado WHERE status LIKE '%os%'";
$result_aceitos = $db->query($sql_aceitos);

$aceitos = 0;

if ($result_aceitos->num_rows > 0) {
    $row = $result_aceitos->fetch_assoc();
    $aceitos = $row['total'];
}

$sql_recusados = "SELECT COUNT(*) as total FROM vw_vizualizar_chamado WHERE status NOT LIKE '%os%'";
$result_recusados = $db->query($sql_recusados);

$recusados = 0;

if ($result_recusados->num_rows > 0) {
    $row = $result_recusados->fetch_assoc();
    $recusados = $row['total'];
}

$total = $aceitos + $recusados;

$db->close();
?>

