<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Entity\Notificacao;

if (isset($_GET['id_not'])) {
    $idNot = $_GET['id_not'];
    print_r($idNot); 
    // die;// Apenas para depuração
    
    // Chame o método estático vizualizarNot
    $aceitou = Notificacao::vizualizarNot($idNot);

    if ($aceitou) {
        header('Location: ../../pages/main_tela_inicial.php');
        exit;
    } else {
        echo 'Erro ao visualizar a notificação.';
    }
} else {
    echo 'ID da notificação não fornecido.';
}