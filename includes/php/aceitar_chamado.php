<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Entity\Chamado;
use App\Entity\Notificacao;
use App\Entity\Usuario;


session_start();


if (isset($_SESSION['id_user'])) {

    $objUsuario = Usuario::getUser($_SESSION['id_user']);

    $objchamado = Chamado::getChama2($_GET['id_chamado']);

    if ($objchamado instanceof Chamado) {
        
        $aceitou = $objchamado->AceitarChamado();

        if ($aceitou) {
            $id_chamado = $_GET['id_chamado'];
            $mensagemNotificacao = 'O Chamado ' . $id_chamado . ' virou uma Ordem de Serviço (os)';

            // Obtém o ID do usuário
            $userId = $_SESSION['id_user'];

            // Criando uma nova notificação
            $notificacao = new Notificacao();
            $resultado = $notificacao->cadastrar($mensagemNotificacao, $userId, $id_chamado);

            if ($resultado) {
                echo '<script>
                alert("Seu Chamado virou uma Os");
                window.location.href = "../../pages/main_tela_inicial.php"; // Substitua pela URL para onde deseja redirecionar
                </script>';
    
                exit; 
            } else {
                echo 'Erro ao cadastrar a notificação.';
            }
        } else {
            echo 'Erro ao aceitar o chamado.';
        }
    } else {
        echo 'Chamado não encontrado.';
    }
} else {
    echo 'Usuário não está logado.';
}
