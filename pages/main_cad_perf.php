<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_perf.php");

?>
<link rel="stylesheet" href="../assets/css/cad_perf.css">
<title>Cadatrar Perfil</title>

<body>

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

                    <h1 id="txt-cad">Chamados:</h1>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox" name="cadastrar_chamado"/>
                            <div for="">Cadastrar Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="todas_os"/>
                            <div for="">Todos Chamados</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="requisicao_chamado"/>
                            <div for="">Requisições de Chamados</div>
                        </label>


                        <label class="container-check">
                            <input type="checkbox" name="relatorio_chamado"/>
                            <div for="">Relatório de Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="aceitar_recusar_chamado"/>
                            <div for="">Aceitar/recusar Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="editar_chamado"/>
                            <div for="">Editar Chamado</div>
                        </label>
                    </div>

                </section>

                <section class="perm-chama">

                    <h1 id="txt-cad">OS:</h1>


                    <div class="juntar-check">

                        <label class="container-check">
                            <input type="checkbox" name="relatorio_os"/>
                            <div for="">Relatório de OS</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="responder_os"/>
                            <div for="">Responder OS</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="aceitar_recusar_os"/>
                            <div for="">Aceitar/recusar OS</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="editar_os"/>
                            <div for="">Editar OS</div>
                        </label>
                    </div>

                </section>

                <section class="perm-cad">

                    <h1 id="txt-cad">Cadastros:</h1>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Cadastrar Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="cadastrar_usuario"/>
                            <div for="">Cadastrar Usuário</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox" name="cadastrar_perfil"/>
                            <div for="">Cadastrar Perfil</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="cadastrar_item"/>
                            <div for="">Cadastrar Item</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox" name="cadastrar_cliente"/>
                            <div for="">Cadastrar cliente</div>
                        </label>
                    </div>


                </section>


                <section class="perm-adm">

                    <h1 id="txt-cad">Administrativo:</h1>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox" name="gerenciar_usuario"/>
                            <div for="">Gerenciar Usuário</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="gerenciar_perfil"/>
                            <div for="">Gerenciar Perfil</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox" name="gerenciar_item"/>
                            <div for="">Gerenciar Item</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox" name="gerenciar_cliente"/>
                            <div for="">Gerenciar Cliente</div>
                        </label>
                    </div>

                </section>



                <div class="btn-field">

                    <button class="btn-submit" type="submit">Cadastrar</button>
                    <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

                </div>


            </form>


        </section>



    </body>

    </html>
</body>

</html>