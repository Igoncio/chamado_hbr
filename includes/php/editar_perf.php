<?php

use App\Entity\Perfil;

$objperfil = Perfil::getPerfil2($_GET['id_perf']);

// echo '<pre>'; print_r($objperfil->nome); echo'</pre>';
// exit;
if (isset($_POST["nome"])) {

    $objperfil = Perfil::getPerfil2($_GET['id_perf']);

    if (!$objperfil) {

        echo "perfil não encontrado.";
        exit;
    }


    $objperfil->nome = $_POST["nome"];

    $objperfil->atualizar();

    if ($objperfil) {
        // Usando JavaScript para redirecionamento
        echo '<script>window.location.href = "main_ger_perf.php";</script>';
        exit;
    } else {
        echo "Falha ao atualizar o perfil.";
    }

}