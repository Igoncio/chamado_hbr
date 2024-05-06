<?php

require_once __DIR__ . '/../vendor/autoload.php';



include_once("../includes/menu.php");
include_once("../includes/php/seus_chamados.php");
// include_once("../includes/php/excluir_user.php");
?>

<link rel="stylesheet" href="../assets/css/requisicao_chama.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="../assets/js/seus_chamados.js" defer></script>
<title>Validar Chamado</title>
<body>


    
    <h1 id="titulo_page">Seus Chamados</h1>
    <button id="btn-alternador" onclick="toggleView()">Alternar Visualização</button>


    <div id="tableView" style="display: none;">
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
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
                    <th scope="col">Ações</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
            <?=$user_table?>
            </table>
        </div>
    </div>

    <div id="cardView">
            <section class="area-main">
            <!-- Conteúdo em formato de cartão -->
            <?=$user_lista?>
        </section>
    </div>

        
    


</body>
    
</html>
