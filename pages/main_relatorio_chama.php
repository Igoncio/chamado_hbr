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
    <title>Relatório de Chamados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/requisicao_chama.css">
    <link rel="stylesheet" href="../assets/css/relatorio_chamado.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <h1 id="txt-titulo">Relatório de Chamado</h1>
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

    <div class="area-result">
        <h2 id="titulo2">Resultados:</h2>

        <ul class="result-content">
            <li>
                <h5>Total de Chamados: <span id="total-chamados"></span></h5>
            </li>
            <li>
                <h5>Chamados aceitos: <span id="aceitos"></span></h5>
            </li>
            <li>
                <h5>Chamados recusados: <span id="recusados"></span></h5>
            </li>
            <li>
                <h5>Prioridade baixa: <span id="prioridade-baixa"></span></h5>
            </li>
            <li>
                <h5>Prioridade média: <span id="prioridade-media"></span></h5>
            </li>
            <li>
                <h5>Prioridade alta: <span id="prioridade-alta"></span></h5>
            </li>
        </ul>
    </div>

    <div id="tableView" style="height: 450px; overflow-y: auto;">
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
                            // Substitui o status conforme necessário
                            $status = htmlspecialchars($row['status']);
                            if ($status === 'os_respondida') {
                                echo 'Aceito';
                            } elseif ($status === 'os_finalizada') {
                                echo 'Aceito';
                            } elseif ($status === 'os') {
                                echo 'Aceito';
                            } elseif ($status === 'nao_visto') {
                                echo 'Aguardando Resposta';
                            } else {
                                echo $status; // Exibe o status original se não corresponder a nenhum dos casos
                            }
                            ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
       $(document).ready(function () {
    // Função para atualizar a lista de equipamentos com base no cliente selecionado
    function updateEquipamentos(id_cli) {
        $.ajax({
            type: 'POST',
            url: '../includes/php/filtrar_relatorio.php',
            data: { id_cli: id_cli },
            success: function (html) {
                $('#equipamento').html(html);
                $('#equipamento').val('0'); // Reseta o filtro de equipamento para "Todos Equipamentos"
                filterTable();  // Aplica o filtro após atualizar os equipamentos
            }
        });
    }

    // Atualiza os equipamentos quando o cliente é selecionado
    $('#cliente').on('change', function () {
        var id_cli = $(this).val();
        updateEquipamentos(id_cli); // Atualiza equipamentos e reseta filtro
    });

    // Atualiza a tabela quando o equipamento é selecionado
    $('#equipamento').on('change', function () {
        filterTable();
    });

    // Função para filtrar a tabela com base no cliente e equipamento selecionados
    function filterTable() {
        var selectedClient = $('#cliente').val();
        var selectedEquipamento = $('#equipamento').val();

        $('#table-body tr').each(function () {
            var rowClient = $(this).data('id-cli');
            var rowEquipamento = $(this).data('id-item');

            // Verifica se o cliente e o equipamento correspondem aos filtros selecionados
            var matchesClient = (selectedClient === "0" || rowClient == selectedClient);
            var matchesEquipamento = (selectedEquipamento === "0" || rowEquipamento == selectedEquipamento);

            // Exibe ou oculta a linha com base nos filtros
            $(this).toggle(matchesClient && matchesEquipamento);
        });

        updateTotals();  // Atualiza os totais após aplicar o filtro
    }

    // Atualiza os totais com base nas linhas visíveis
    function updateTotals() {
        var total = $('#table-body tr:visible').length;
        
        var aceitos = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(8).text().trim() === 'Aceito';
        }).length;
        
        var recusados = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(8).text().trim() === 'Recusado';
        }).length;

        var prioridadeBaixa = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim() === 'baixa';
        }).length;

        var prioridadeMedia = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim() === 'media';
        }).length;

        var prioridadeAlta = $('#table-body tr:visible').filter(function() {
            return $(this).find('td').eq(5).text().trim() === 'alta';
        }).length;

        $('#total-chamados').text(total);
        $('#aceitos').text(aceitos);
        $('#recusados').text(recusados);
        $('#prioridade-baixa').text(prioridadeBaixa);
        $('#prioridade-media').text(prioridadeMedia);
        $('#prioridade-alta').text(prioridadeAlta);
    }

    // Inicializa a tabela com todos os dados visíveis
    filterTable();
});

    </script>

</body>

</html>