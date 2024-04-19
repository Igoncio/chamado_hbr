<?php

use App\Entity\Perfil;

$objperf = Perfil::getPerfil2($_GET['id_perf']);

// Verificar se o ID do item está presente e é um número válido
if (!isset($_GET['id_perf']) || !is_numeric($_GET['id_perf'])) {
    header('Location: main_ger_perf.php');
    exit;
}

// Consulta o item e verifica se é uma instância de Item
$objperf = Perfil::getPerfil2($_GET['id_perf']);
if (!$objperf instanceof Perfil) {
    header('Location: main_ger_perf.php');
    exit;
}

// Verifica se o formulário foi submetido para exclusão
if (isset($_POST['excluir'])) {

    print_r($objperf);
    $objperf->excluir();
    echo '<script>window.location.href = "main_ger_perf.php";</script>';
    exit;
}
