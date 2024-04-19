<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/ger_cli.php");
// include_once("../includes/php/excluir_user.php");
?>
<link rel="stylesheet" href="../assets/css/ger_user.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>gerenciar cliente</title>
<body>
    

<section class="area-main">
    <h1 id="titulo-page">Gerenciar Cliente</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th>Rua</th>
                <th>Numero</th>
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


<script>
    $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>

</body>
</html>