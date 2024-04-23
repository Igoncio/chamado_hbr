<?php

require_once __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('America/Cuiaba'); // Define o fuso horário para São Paulo
$timestamp = time(); // Obtém o timestamp UNIX atual
$timestamp_formatado = date('Y-m-d H:i:s', $timestamp);
echo $timestamp_formatado; // Exibe o timestamp formatado


print_r( $id_personalizado );

include_once("../includes/menu.php");
include_once("../includes/php/vizualizar_chamado.php");
// include_once("../includes/php/excluir_user.php");
?>
<link rel="stylesheet" href="../assets/css/vizualizar_chamado.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>vizualizar chamados</title>
<body>
    

    <section class="area-main">
        <h1 id="titulo-page">Vizualizar Chamados</h1>
        
        <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipamento</th>
                        <th>Cliente</th>
                        <th>Responsavel</th>
                        <th>Solicitante</th>
                        <th>Prioridade</th>
                        <th>Abertura</th>
                        <th>Fechamento</th>
                    </tr>
                  </thead>
                </table>
        </div>
              <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                  <?= $user_lista ?>
                </table>
              </div>
        
    </section>
    
</body>
</html>