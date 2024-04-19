<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/ger_equip.php");
// include_once("../includes/php/excluir_user.php");
?>
<link rel="stylesheet" href="../assets/css/ger_user.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>gerenciar equipamento</title>
<body>
    

    <section class="area-main">
        <h1 id="titulo-page">Gerenciar Equipamento</h1>
        
        <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                  <thead>
                    <tr>
                        <th>Apelido</th>
                        <th>Nome</th>
                        <th>N° Série</th>
                        <th>Cliente</th>
                        <th>Perfil</th>
                        <th>#</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
            
                    <?=$user_lista;?>
                </table>
              </div>
        
    </section>
    
</body>
</html>