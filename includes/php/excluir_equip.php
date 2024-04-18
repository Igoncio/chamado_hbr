<?php

use App\Entity\Item;

// Verificar se o ID do item está presente e é um número válido
if (!isset($_GET['id_item']) || !is_numeric($_GET['id_item'])) {
    header('Location: main_ger_equip.php');
    exit;
}

// Consulta o item e verifica se é uma instância de Item
$objiten = Item::getEquip2($_GET['id_item']);
if (!$objiten instanceof Item) {
    header('Location: main_ger_equip.php');
    exit;
}

// Verifica se o formulário foi submetido para exclusão
if (isset($_POST['excluir'])) {

    print_r($objiten);
    $objiten->excluir();
    echo '<script>window.location.href = "main_ger_equip.php";</script>';
    exit;
}
