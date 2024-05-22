<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_perf.php");

?>
<link rel="stylesheet" href="../assets/css/cad_perf.css">
<script src="../assets/js/cad_perf.js" defer></script>
<title>Cadastrar Perfil</title>

<body>

    <section class="area-main">

        <form class="area-form" method="POST" action="">

            <h1 id="titulo_page">Cadastrar Perfil</h1>

            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" name="nome" placeholder="Nome do Perfil" />
                </div>

            </div>


            <h1 id="txt-perm">Permissões</h1>
            <section class="perm-chama">
            
            <div>
                <input type="radio" id="opcaoTodas" name="opcao" value="todas">
                <label for="opcaoTodas">Selecionar todas</label><br>

                <input type="radio" id="perfilComum" name="opcao" value="comum">
                <label for="perfilComum">Perfil Comum</label><br>

                <input type="radio" id="perfilTec" name="opcao" value="admin">
                <label for="perfilAdmin">Perfil Técnico</label><br>

                <input type="radio" id="perfilCli" name="opcao" value="admin">
                <label for="perfilAdmin">Perfil Cliente</label><br>
            </div>



            <h1 id="txt-cad">Chamados:</h1>

            <div class="area-perm">

                <label class="container-check">
                    <input type="checkbox" name="cadastrar_chamado" value="1">
                    <div for="">Cadastrar Chamado</div>
                </label>
                
                <label class="container-check">
                    <input type="checkbox" name="vizualizar_chamado" value="1">
                    <div for="">Todos Chamados</div>
                </label>
                
                <label class="container-check">
                    <input type="checkbox" name="requisicao_chamado" value="1">
                    <div for="">Requisições de Chamados</div>
                </label>
                
                
                <label class="container-check">
                    <input type="checkbox" name="relatorio_chamado" value="1">
                    <div for="">Relatório de Chamado</div>
                </label>
                
                <label class="container-check">
                    <input type="checkbox" name="aceitar_recusar_chamado" value="1">
                <div for="">Aceitar/recusar Chamado</div>
                </label>
                
                <label class="container-check">
                    <input type="checkbox" name="editar_chamado" value="1">
                    <div for="">Editar Chamado</div>
                </label>
            </div>
            
            
        </section>

            <section class="perm-chama">

                <h1 id="txt-cad">OS:</h1>



                <div class="area-perm">

                    <label class="container-check">
                        <input type="checkbox" name="relatorio_os" value="1">
                        <div for="">Relatório de OS</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="responder_os" value="1">
                        <div for="">Responder OS</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="aceitar_recusar_os" value="1">
                        <div for="">Aceitar/recusar OS</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="editar_os" value="1">
                        <div for="">Editar OS</div>
                    </label>


                    <label class="container-check">
                        <input type="checkbox" name="todas_os" value="1">
                        <div for="">Todas OS</div>
                    </label>
                </div>

            </section>

            <section class="perm-cad">

                <h1 id="txt-cad">Cadastros:</h1>

                <div class="area-perm">
                    <label class="container-check">
                        <input type="checkbox" name="cadastrar_usuario" value="1">
                        <div for="">Cadastrar Usuário</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="cadastrar_perfil" value="1">
                        <div for="">Cadastrar Perfil</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="cadastrar_item" value="1">
                        <div for="">Cadastrar Item</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="cadastrar_cliente" value="1">
                        <div for="">Cadastrar cliente</div>
                    </label>


                    <label class="container-check">
                        <input type="checkbox" name="cadastrar_equipamento" value="1">
                        <div for="">Cadastrar equipamento</div>
                    </label>
                </div>


            </section>


            <section class="perm-adm">

                <h1 id="txt-cad">Administrativo:</h1>

                <div class="area-perm">
                    <label class="container-check">
                        <input type="checkbox" name="gerenciar_usuario" value="1">
                        <div for="">Gerenciar Usuário</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="gerenciar_perfil" value="1">
                        <div for="">Gerenciar Perfil</div>
                    </label>

                    <label class="container-check">
                        <input type="checkbox" name="gerenciar_equipamento" value="1">
                        <div for="">Gerenciar equipamento</div>
                    </label>



                    <label class="container-check">
                        <input type="checkbox" name="gerenciar_cliente" value="1">
                        <div for="">Gerenciar Cliente</div>
                    </label>

                </div>
            </section>

            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a>

            </div>


        </form>


    </section>



</body>

</html>