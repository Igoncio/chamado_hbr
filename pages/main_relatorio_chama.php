<?php
include_once ("../app/Db/connPoo.php");
include_once ("../includes/menu.php");
require_once __DIR__ . '/../vendor/autoload.php';
include_once ("../includes/php/relatorio_os.php");

$query = "SELECT * FROM cliente";
$result = $db->query($query);

// Obtém os dados da tabela para gerar a tabela HTML
$queryChamado = "SELECT * FROM vw_vizualizar_chamado";
$resultChamado = $db->query($queryChamado);

$total_chamados_query = "SELECT COUNT(*) AS total_linhas FROM vw_vizualizar_chamado;";
$total_chama = $db->query($total_chamados_query);

if ($total_chama) {
    $row = $total_chama->fetch_assoc();
    $total_linhas = $row['total_linhas'];
} else {
    echo "Erro ao executar a consulta.";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Relatório de OS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/requisicao_chama.css">
    <link rel="stylesheet" href="../assets/css/relatorio_chamado.css">
    <link rel="stylesheet" href="../assets/css/imprimir_relatorio.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body>

    
    

    <h1 id="txt-titulo">Relatório de OS</h1>
    <div class="area-filtro">
        <h2 id="titulo2">Filtrar</h2>
        <ul class="filtro-content">
            <select id="cliente" class="select" name="id_cli">
                <option value="0">Todos os Clientes</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id_cli'] . '">' . htmlspecialchars($row['nome']) . '</option>';
                    }
                } else {
                    echo '<option>Sem Clientes</option>';
                }
                ?>
            </select>

            <select id="equipamento" class="select" name="id_item">
                <option value="0">Todos os Equipamentos</option>
            </select>
        </ul>
    </div>

    <div id="tableView">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Chamado</th>
                    <th scope="col">Requisitante</th>
                    <th scope="col">Abertura</th>
                    <th scope="col">Equipamento(s)</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table-body">
                <?php while ($row = $resultChamado->fetch_assoc()): ?>
                    <tr data-id-cli="<?= $row['id_cli'] ?>" data-id-item="<?= $row['id_item'] ?>">
                        <td><?= htmlspecialchars($row['id_chamado']) ?></td>
                        <td><?= htmlspecialchars($row['nome_solicitante']) ?></td>
                        <td><?= htmlspecialchars($row['abertura']) ?></td>
                        <td><?= htmlspecialchars($row['nome_equip']) ?></td>
                        <td><?= htmlspecialchars($row['tipo']) ?></td>
                        <td><?= htmlspecialchars($row['prioridade']) ?></td>
                        <td><?= htmlspecialchars($row['nome_resp']) ?></td>
                        <td><?= htmlspecialchars($row['nome_cliente']) ?></td>
                        <td>
                            <?php
                            $status = htmlspecialchars($row['status']);
                            if ($status === 'os_respondida') {
                                echo 'Respondida';
                            } elseif ($status === 'os_finalizada') {
                                echo 'Finalizada';
                            } elseif ($status === 'os') {
                                echo 'Aguardando Resposta';
                            } else {
                                echo $status; 
                            }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="area-result">
        <ul class="result-content">
            <li>
                <h5 id="txt-result">Total de OS: <?php echo $total_linhas;?></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Finalizadas: <?php echo $total_linhas_finalizadas;?></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Respondida: <?php echo  $total_linhas_respondida;?></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Aguardando Resposta: <?php echo $total_linhas_aguardando?></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Baixa:<?php echo $total_linhas_baixa;?></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Média: <?php echo $total_linhas_media?></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Alta: <?php echo $total_linhas_alta;?></h5>
            </li>
        </ul>
    </div>

    <a href="../includes/php/gerar_pdf_chama.php" target="_blank">
        <button>Gerar PDF</button>
    </a>
    <button onclick="window.print()">Imprimir</button>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
$(document).ready(function () {
    var table = $('.table').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        pageLength: 25,
        lengthChange: true,
        lengthMenu: [25, 50, 100]
    });

    function updateEquipamentos(id_cli) {
        $.ajax({
            type: 'POST',
            url: '../includes/php/filtrar_relatorio.php',
            data: { id_cli: id_cli },
            success: function (html) {
                $('#equipamento').html(html);
                $('#equipamento').val('0'); 
                filterTable();  
            }
        });
    }

    $('#cliente').on('change', function () {
        var id_cli = $(this).val();
        updateEquipamentos(id_cli); 
    });

    $('#equipamento').on('change', function () {
        filterTable();
    });

    function filterTable() {
        var selectedClient = $('#cliente').val();
        var selectedEquipamento = $('#equipamento').val();

        $('#table-body tr').each(function () {
            var rowClient = $(this).data('id-cli');
            var rowEquipamento = $(this).data('id-item');

            var matchesClient = (selectedClient === "0" || rowClient == selectedClient);
            var matchesEquipamento = (selectedEquipamento === "0" || rowEquipamento == selectedEquipamento);

            $(this).toggle(matchesClient && matchesEquipamento);
        });

        updateTotals();  
    }

    filterTable();

    $('#save-pdf').on('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Relatório de OS", 14, 16);
        doc.autoTable({
            html: '.table',
            startY: 20,
            theme: 'grid'
        });

        doc.save('relatorio_os.pdf');
    });

    window.onbeforeprint = function() {
        table.page.len(-1).draw();
    };

    window.onafterprint = function() {
        table.page.len(10).draw();
    };
});

    </script>
</body>

</html>
