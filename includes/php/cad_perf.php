<?php

use App\Entity\Perfil;

if (
    isset($_POST["nome"]) &&
    (
        isset($_POST["cadastrar_chamado"]) || isset($_POST["vizualizar_chamado"]) ||
        isset($_POST["requisicao_chamado"]) || isset($_POST["relatorio_chamado"]) ||
        isset($_POST["aceitar_recusar_chamado"]) || isset($_POST["editar_chamado"]) ||
        isset($_POST["relatorio_os"]) || isset($_POST["responder_os"]) ||
        isset($_POST["aceitar_recusar_os"]) || isset($_POST["editar_os"]) ||
        isset($_POST["todas_os"]) || isset($_POST["cadastrar_usuario"]) ||
        isset($_POST["cadastrar_perfil"]) || isset($_POST["cadastrar_item"]) ||
        isset($_POST["cadastrar_cliente"]) || isset($_POST["cadastrar_equipamento"]) ||
        isset($_POST["gerenciar_usuario"]) || isset($_POST["gerenciar_perfil"]) ||
        isset($_POST["gerenciar_equipamento"]) || isset($_POST["gerenciar_cliente"])
    )
) {
    $objperfil = new Perfil();

    $objperfil->nome = $_POST["nome"];
    $objperfil->cadastrar_chamado = isset($_POST["cadastrar_chamado"]) ? $_POST["cadastrar_chamado"] : 0;
    $objperfil->vizualizar_chamado = isset($_POST["vizualizar_chamado"]) ? $_POST["vizualizar_chamado"] : 0;
    $objperfil->requisicao_chamado = isset($_POST["requisicao_chamado"]) ? $_POST["requisicao_chamado"] : 0;
    $objperfil->relatorio_chamado = isset($_POST["relatorio_chamado"]) ? $_POST["relatorio_chamado"] : 0;
    $objperfil->aceitar_recusar_chamado = isset($_POST["aceitar_recusar_chamado"]) ? $_POST["aceitar_recusar_chamado"] : 0;
    $objperfil->editar_chamado = isset($_POST["editar_chamado"]) ? $_POST["editar_chamado"] : 0;
    $objperfil->relatorio_os = isset($_POST["relatorio_os"]) ? $_POST["relatorio_os"] : 0;
    $objperfil->responder_os = isset($_POST["responder_os"]) ? $_POST["responder_os"] : 0;
    $objperfil->aceitar_recusar_os = isset($_POST["aceitar_recusar_os"]) ? $_POST["aceitar_recusar_os"] : 0;
    $objperfil->editar_os = isset($_POST["editar_os"]) ? $_POST["editar_os"] : 0;
    $objperfil->todas_os = isset($_POST["todas_os"]) ? $_POST["todas_os"] : 0;
    $objperfil->cadastrar_usuario = isset($_POST["cadastrar_usuario"]) ? $_POST["cadastrar_usuario"] : 0;
    $objperfil->cadastrar_perfil = isset($_POST["cadastrar_perfil"]) ? $_POST["cadastrar_perfil"] : 0;
    $objperfil->cadastrar_item = isset($_POST["cadastrar_item"]) ? $_POST["cadastrar_item"] : 0;
    $objperfil->cadastrar_cliente = isset($_POST["cadastrar_cliente"]) ? $_POST["cadastrar_cliente"] : 0;
    $objperfil->cadastrar_equipamento = isset($_POST["cadastrar_equipamento"]) ? $_POST["cadastrar_equipamento"] : 0;
    $objperfil->gerenciar_usuario = isset($_POST["gerenciar_usuario"]) ? $_POST["gerenciar_usuario"] : 0;
    $objperfil->gerenciar_perfil = isset($_POST["gerenciar_perfil"]) ? $_POST["gerenciar_perfil"] : 0;
    $objperfil->gerenciar_equipamento = isset($_POST["gerenciar_equipamento"]) ? $_POST["gerenciar_equipamento"] : 0;
    $objperfil->gerenciar_cliente = isset($_POST["gerenciar_cliente"]) ? $_POST["gerenciar_cliente"] : 0;

    $objperfil->cadastrar();
}

?>