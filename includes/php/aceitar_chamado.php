<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Entity\Chamado;
$objchamado = Chamado::getChama2($_GET['id_chamado']);

// $objchamado = Chamado::getChama2($_GET['id_chamado']);
// Verifica se o formulário foi submetido para aceitar o chamado
    // Obtém o objeto do chamado com base no ID enviado no formulário
    $objchamado = Chamado::getChama2($_GET['id_chamado']);

    // Verifica se o objeto é válido
    if ($objchamado instanceof Chamado) {
        // Chama a função AceitarChamado() para atualizar o status
        $aceitou = $objchamado->AceitarChamado();

        if ($aceitou) {
            // Redireciona para a página principal após aceitar o chamado
            echo '<script>window.location.href = "../../pages/main_requisicao_chamado.php";</script>';
            exit;
        } else {
            echo 'Erro ao aceitar o chamado.';
        }
    } else {
        echo 'Chamado não encontrado.';
    }

