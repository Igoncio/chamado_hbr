<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/ger_perf.php");
// include_once("../includes/php/excluir_user.php");
?>
<link rel="stylesheet" href="../assets/css/ger_perf.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>gerenciar perfil</title>
<body>
    
  <section class="area-main">
    <h1 id="titulo-page">Gerenciar Perfil</h1>
    
    
    <div  id="tableView" style="height: 450px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                      <th>Nome</th>
                      <th>#</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?=$user_lista?>
                </tbody>
            </table>
        </div>
        
    </section>
    
</body>
</html>