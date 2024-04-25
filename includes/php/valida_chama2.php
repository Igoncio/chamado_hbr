<?php

use App\Entity\Chamado;

$objchama = Chamado::getChama2($_GET['id_chamado']);


// Verificar se o ID do item está presente e é um número válido
if (!isset($_GET['id_chamado']) || !is_numeric($_GET['id_chamado'])) {
    
    // echo "<pre>"; print_r($_GET['id_chamado']); echo"</pre>";
    // exit;
    // echo'ERRO';
    echo '<script>window.location.href = main_validar_chamado.php";</script>';
    exit;
}

// Consulta o item e verifica se é uma instância de Item
$objchama = Chamado::getChama2($_GET['id_chamado']);
if (!$objchama instanceof Chamado) {
    header('Location: main_validar_chama2.php');
    exit;
}

