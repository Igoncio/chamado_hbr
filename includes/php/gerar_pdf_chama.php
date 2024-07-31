<?php
// Inclua a biblioteca TCPDF
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Entity\Chamado;

// Obtenha os dados
$dados = Chamado::getChama();

// Defina os rótulos de status
$statusLabels = [
    'os' => 'Aguardando Resposta',
    'os_respondida' => 'Respondido',
    'os_finalizada' => 'Finalizado',
];

$user_table = ""; // Inicialize a variável da tabela de usuários

// Preencha a tabela com os dados
foreach ($dados as $user) {
    if (isset($statusLabels[$user['status']])) {
        $status = $statusLabels[$user['status']];
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
                <td>" . $status . "</td>
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

$total_chamados_query = "SELECT COUNT(*) AS total_linhas FROM vw_vizualizar_chamado WHERE status = 'os';";
$total_chama = $db->query($total_chamados_query);

if ($total_chama) {
    $row = $total_chama->fetch_assoc();
    $total_linhas = $row['total_linhas'];
} else {
    echo "Erro ao executar a consulta.";
}

$total_chamados_finalizados_query = "SELECT COUNT(*) AS total_finalizados FROM vw_vizualizar_chamado WHERE status = 'os_finalizada';";
$total_finalizados = $db->query($total_chamados_finalizados_query);

if ($total_finalizados) {
    $row_finalizados = $total_finalizados->fetch_assoc();
    $total_linhas_finalizadas = $row_finalizados['total_finalizados'];
} else {
    echo "Erro ao executar a consulta.";
}


$total_chamados_respondido_query = "SELECT COUNT(*) AS total_respondido FROM vw_vizualizar_chamado WHERE status = 'os_respondida';";
$total_respondido = $db->query($total_chamados_respondido_query);

if ($total_respondido) {
    $row_respondido = $total_respondido->fetch_assoc();
    $total_linhas_respondida = $row_respondido['total_respondido'];
} else {
    echo "Erro ao executar a consulta.";
}


$total_chamados_aguardando_query = "SELECT COUNT(*) AS total_aguardando FROM vw_vizualizar_chamado WHERE status = 'os';";
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

// Crie uma nova instância do TCPDF
$pdf = new \TCPDF();

// Configure o documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Relatório de Chamados');
$pdf->SetSubject('Relatório');
$pdf->SetKeywords('TCPDF, PDF, relatório, chamado');

// Remova as informações de cabeçalho e rodapé
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Adicione uma página
$pdf->AddPage();

// Defina a fonte
$pdf->SetFont('helvetica', '', 10);
date_default_timezone_set('America/Cuiaba');
// data e a hora atuais
$dataHoraAtual = date('d/m/Y H:i:s');

// conteúdo do relatório
$html = '
<style>
    body {
        font-family: Helvetica, Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        font-size: 10px;
    }
    th {
        background-color: #007BFF;
        color: #fff;
        font-weight: normal;
        text-transform: uppercase;
    }
    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tbody tr:hover {
        background-color: #e9ecef;
    }
    tbody tr:last-child td {
        border-bottom: 1px solid #ddd;
    }
    .header {
        margin: 20px 0;
        font-size: 12px;
        color: #333;
    }
</style>

<div class="header">
    <h3>Relatório de Todos Chamados</h3>
    <p><strong>Data e Hora da Geração:</strong> ' . $dataHoraAtual . '</p>
</div>

<div class="summary">
    <p><strong>Total de Chamados:</strong> ' . $total_linhas . '</p>
    <p><strong>Total Finalizados:</strong> ' . $total_linhas_finalizadas . '</p>
    <p><strong>Total Respondidos:</strong> ' . $total_linhas_respondida . '</p>
    <p><strong>Total Aguardando:</strong> ' . $total_linhas_aguardando . '</p>
    <p><strong>Total Baixa Prioridade:</strong> ' . $total_linhas_baixa . '</p>
    <p><strong>Total Média Prioridade:</strong> ' . $total_linhas_media . '</p>
    <p><strong>Total Alta Prioridade:</strong> ' . $total_linhas_alta . '</p>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Requisitante</th>
            <th>Abertura</th>
            <th>Equipamento</th>
            <th>Tipo</th>
            <th>Prioridade</th>
            <th>Nome Responsável</th>
            <th>Nome Cliente</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        '. $user_table .'
    </tbody>
</table>';

// Escreva o conteúdo HTML no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Feche e gere o PDF
$pdf->Output('relatorio_chamados.pdf', 'I');
?>
