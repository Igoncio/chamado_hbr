<?php

require_once __DIR__ . '/../vendor/autoload.php';



include_once("../includes/menu.php");
include_once("../includes/php/validar_chamado.php");
// include_once("../includes/php/excluir_user.php");
?>

<link rel="stylesheet" href="../assets/css/vizualizar_chama2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>Validar Chamado</title>
<body>


    <h1 id="titulo_page">Vizualizar Chamado</h1>
    <section class="area-main">

      <?= $user_lista ?>  
      

    </section>

</body>
    
</html>
