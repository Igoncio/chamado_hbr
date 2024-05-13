<?php

use App\Entity\Perfil;

if (isset($_POST["nome"]) && isset($_POST["cadastrar_chamado"]) && isset($_POST["todas_os"]) && isset($_POST["requisicao_chamado"]) && isset($_POST["relatorio_chamados"]) && isset($_POST["aceitar_recusar_chamado"]) && isset($_POST["editar_chamado"]) && isset($_POST["relatorio_os"]) && isset($_POST["responder_os"]) && isset($_POST["aceitar_recusar_os"]) && isset($_POST["editar_os"]) && isset($_POST["cadastrar_usuario"]) && isset($_POST["cadastrar_perfil"]) && isset($_POST["cadastrar_item"]) && isset($_POST["cadastrar_cliente"]) && isset($_POST["gerenciar_usuario"]) && isset($_POST["gerenciar_perfil"]) && isset($_POST["gerenciar_item"]) && isset($_POST["gerenciar_cliente"])) {

    $objperfil = new Perfil();

    $objperfil->nome = $_POST["nome"];
    $objperfil->cadastrar_chamado = $_POST["cadastrar_chamado"];
    $objperfil->todas_os = $_POST["todas_os"];
    $objperfil->requisicao_chamado = $_POST["requisicao_chamado"];
    $objperfil->relatorio_chamados = $_POST["relatorio_chamados"];
    $objperfil->aceitar_recusar_chamado = $_POST["aceitar_recusar_chamado"];
    $objperfil->editar_chamado = $_POST["editar_chamado"];
    $objperfil->relatorio_os = $_POST["relatorio_os"];
    $objperfil->responder_os = $_POST["responder_os"];
    $objperfil->aceitar_recusar_os = $_POST["aceitar_recusar_os"];
    $objperfil->editar_os = $_POST["editar_os"];
    $objperfil->cadastrar_usuario = $_POST["cadastrar_usuario"];
    $objperfil->cadastrar_perfil = $_POST["cadastrar_perfil"];
    $objperfil->cadastrar_item = $_POST["cadastrar_item"];
    $objperfil->cadastrar_cliente = $_POST["cadastrar_cliente"];
    $objperfil->gerenciar_usuario = $_POST["gerenciar_usuario"];
    $objperfil->gerenciar_perfil = $_POST["gerenciar_perfil"];
    $objperfil->gerenciar_item = $_POST["gerenciar_item"];
    $objperfil->gerenciar_cliente = $_POST["gerenciar_cliente"];

    $objperfil->cadastrar();

}