<?php

require_once __DIR__ . '/../vendor/autoload.php';



include_once ("../includes/menu.php");
include_once ("../includes/php/vizualizar_chamado.php");
// include_once("../includes/php/excluir_user.php");
?>
<link rel="stylesheet" href="../assets/css/vizualizar_chamado.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>vizualizar chamados</title>

<body>


  <section class="area-main">
    <h1 id="titulo-page">Vizualizar Chamados</h1>

    <div id="tableView" style="height: 450px; overflow-y: auto;">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Equipamento</th>
            <th>Cliente</th>
            <th>Responsavel</th>
            <th>Requisitante</th>
            <th>Prioridade</th>
            <th>Tipo</th>
            <th>Status</th>
            <th>Abertura</th>
            <th>Fechamento</th>
            <th>Vizualizar</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?= $user_lista ?>
        </tbody>
      </table>
    </div>


  </section>

</body>

</html>