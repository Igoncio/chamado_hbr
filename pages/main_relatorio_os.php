<?php
include_once ("../includes/menu.php");
require_once __DIR__ . '/../vendor/autoload.php';
include_once ("../includes/php/relatorio_chamado.php");
include_once ("../app/Db/connPoo.php");

$query = "SELECT * FROM cliente";
$result = $db->query($query);

// Obtém os dados da tabela para gerar a tabela HTML
$queryChamado = "SELECT * FROM vw_vizualizar_chamado";
$resultChamado = $db->query($queryChamado);
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
                <h5 id="txt-result">Total de OS: <span id="total-os"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Finalizadas: <span id="finalizadas"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Respondida: <span id="respondida"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">OS Aguardando Resposta: <span id="aguardando"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Baixa: <span id="prioridade-baixa"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Média: <span id="prioridade-media"></span></h5>
            </li>
            <li>
                <h5 id="txt-result">Prioridade Alta: <span id="prioridade-alta"></span></h5>
            </li>
        </ul>
    </div>

    <button id="save-pdf">Salvar como PDF</button>
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
        pageLength: 10,
        lengthChange: true,
        lengthMenu: [10, 25, 50, 100]
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

    function updateTotals() {
        var total = $('#table-body tr:visible').length;
        var finalizadas = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(8).text().trim() === 'Finalizada';
        }).length;

        var respondida = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(8).text().trim() === 'Respondida';
        }).length;

        var aguardando = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(8).text().trim() === 'Aguardando Resposta';
        }).length;

        var prioridadeBaixa = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim().toLowerCase() === 'baixa';
        }).length;

        var prioridadeMedia = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim().toLowerCase() === 'média' ||
                   $(this).find('td').eq(5).text().trim().toLowerCase() === 'media';
        }).length;

        var prioridadeAlta = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim().toLowerCase() === 'alta';
        }).length;

        $('#total-os').text(total);
        $('#finalizadas').text(finalizadas);
        $('#respondida').text(respondida);
        $('#aguardando').text(aguardando);
        $('#prioridade-baixa').text(prioridadeBaixa);
        $('#prioridade-media').text(prioridadeMedia);
        $('#prioridade-alta').text(prioridadeAlta);
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
