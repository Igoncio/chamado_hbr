<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Entity\Chamado;
use App\Entity\Notificacao;


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
        // Obtém o valor de 'id_chamado' da URL
        $id_chamado = $_GET['id_chamado'];

        // Montando a string de notificação
        $mensagemNotificacao = 'O Chamado ' . $id_chamado . ' virou uma Ordem de Serviço (os)';

        // Criando uma nova notificação
        $notificacao = new Notificacao();
        $resultado = $notificacao->cadastrar($mensagemNotificacao);

    } 
    if ($resultado) {
        // Redireciona para a tela inicial
        header('Location: ../../pages/main_tela_inicial.php');
        exit; // Garante que o script pare de executar após o
    }
    else {
        echo 'Erro ao aceitar o chamado.';
    }
} else {
    echo 'Chamado não encontrado.';
}

