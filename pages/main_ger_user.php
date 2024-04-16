<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/ger_user.php");

?>
<link rel="stylesheet" href="../assets/css/ger_user.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>gerenciar usuario</title>
<body>
    
    <section class="area-main">
        
        <table class="tabela">
            <thead class="coluna">
                <tr class="linhas">
                <th id="iten-col">Nome</th>
                <th id="iten-col">Telefone</th>
                <th id="iten-col">email</th>
                <th id="iten-col">Local</th>
                <th id="iten-col">Perfil</th>
                <th id="iten-col">#</th>
                </tr>
            </thead>
            <?=$user_lista;?>
        </table>

        
    </section>
    

    
</body>
</html>