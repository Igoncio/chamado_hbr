<?php

include_once ("../includes/menu.php");
require_once __DIR__ . '/../vendor/autoload.php';
include_once ("../includes/php/relatorio_chamado.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de Chamados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="../assets/css/requisicao_chama.css">
</head>
<body>
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>
    <script>
        // Dados do PHP para JavaScript
        var aceitos = <?php echo $aceitos; ?>;
        var recusados = <?php echo $recusados; ?>;
        var total = <?php echo $total; ?>;
        
        // Configuração do gráfico de pizza
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Recusados', 'Aceitos', 'Total'],
                datasets: [{
                    label: 'Chamados',
                    data: [recusados, aceitos, total],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                }
            }
        });

        // Inicialização do DataTable com rolagem
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                scrollY: '30vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false
            });
        });

        
    </script>

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
                <tbody class="table-group-divider" >
                    <?= $user_table ?>
                </tbody>
            </table>
        </div>
</body>
</html>