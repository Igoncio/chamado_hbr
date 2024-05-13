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
                        <input class="input" type="text" name="nome" />
                        <label class="label" for="input">Digite o nome do perfil</label>
                    </div>

                </div>


                <h1 id="txt-perm">Permissões</h1>
                <section class="perm-chama">

                    <h1 id="txt-cad">Chamados:</h1>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Cadastrar Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Vizualizar Chamado</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Validar Chamado</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Relatório de Chamado</div>
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
                            <input type="checkbox">
                            <div for="">Cadastrar Usuário</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Cadastrar Perfil</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Cadastrar Item</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Cadastrar Local</div>
                        </label>
                    </div>


                </section>


                <section class="perm-adm">

                    <h1 id="txt-cad">Administrativo:</h1>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Gerenciar Usuário</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Gerenciar Perfil</div>
                        </label>
                    </div>

                    <div class="juntar-check">
                        <label class="container-check">
                            <input type="checkbox">
                            <div for="">Gerenciar Item</div>
                        </label>

                        <label class="container-check">
                            <input type="checkbox">
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