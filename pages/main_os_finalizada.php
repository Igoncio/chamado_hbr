<?php
require_once __DIR__ . '/../vendor/autoload.php';
include_once ("../includes/menu.php");
include_once ("../includes/php/os_finalizada.php");
?>

<link rel="stylesheet" href="../assets/css/os_respondida.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="../assets/js/requisicao_chamado.js" defer></script>
<title>os finalizada</title>

<body>

    <h1 id="titulo_page">Ordens de Seviço respondidas</h1>
    <button id="btn-alternador" onclick="toggleView()">Alternar Visualização</button>

    <div id="tableView" style="display: none; height: 450px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Chamado</th>
                    <th scope="col">Requisitante</th>
                    <th scope="col">Abertura</th>
                    <th scope="col">Equipamento(s)</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Resposta téc.</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?= $user_table ?>
            </tbody>
        </table>
    </div>



    <div id="cardView">
        <section class="area-main">
            <!-- Conteúdo em formato de cartão -->
            <?= $user_lista ?>
        </section>
    </div>




</body>

</html>