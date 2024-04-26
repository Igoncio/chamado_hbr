<?php

use App\Entity\Chamado;

$objchamado = Chamado::getChama2($_GET['id_chamado']);


// print_r($_GET['id_chamado']);
// echo"<pre>";print_r($objchamado);echo"</pre>";
// exit;
// Verificar se o ID do item está presente e é um número válido

// Verificar se o ID do chamado está presente e é um número válido
function validarIdChamado($id) {
    // Expressão regular para verificar se o ID está no formato Y-M.numero
    $padrao = '/^\d{4}-\d{2}\.\d{4}$/';
    return preg_match($padrao, $id) === 1;
}

// Uso da função para validar o ID passado na URL
if (!isset($_GET['id_chamado']) || !validarIdChamado($_GET['id_chamado'])) {
    header('Location: main_validar_chamado.php');
    exit;
}

// Verificar se o objeto retornado é uma instância de Chamado e não é nulo
if (!$objchamado instanceof Chamado || $objchamado === null) {
    header('Location: main_validar_chama2.php');
    exit;
}

