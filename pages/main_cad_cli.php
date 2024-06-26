<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_cli.php");

?>
<link rel="stylesheet" href="../assets/css/cad_cli.css">
<script src="../assets/js/cad_cli.js" defer></script>
<title>cadastrar cliente</title>

<body>

    <section class="area-main">
        <span id="message"></span>
        <form class="area-form" id="form-cli" method="POST" action="">

            <h1 id="titulo_page">Cadastrar Cliente</h1>

            <div class="input-field">
                <input class="input" name="codigo" type="text" placeholder="Codigo"/>
            </div>

            <div class="input-field">
                <input class="input" name="nome" type="text" placeholder="Nome"/>
            </div>

            <div class="juntar-input">
                <div class="input-field">
                    <input class="input" name="cnpj" type="text" placeholder="Cnpj"/>
                </div>

                <div class="input-field">
                    <input class="input" name="telefone" type="text" placeholder="Telefone"/>
                </div>
            </div>



            <div class="select-field">

                <label id="label-txt" for="">País</label>
                <select class="select" name="pais">
                    <option>Brasil</option>
                    <option>Chile</option>
                    <option>Paraguay</option>
                </select>

            </div>
                <div class="input-field">
                    <input class="input" type="text" id="cep" name="cep" placeholder="Cep"/>
                </div>


            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" id="cidade" name="cidade" placeholder="Cidade"/>
                </div>

                <div class="input-field">
                    <input class="input" type="text" id="estado" name="estado" placeholder="Estado"/>
                </div>


                <div class="input-field">
                    <input class="input" name="numero" type="text" placeholder="Numero"/>
                </div>


            </div>


            <div class="juntar-input">
                <div class="input-field">
                    <input class="input" type="text" id="rua" name="rua" placeholder="Rua"/>
                </div>

                <div class="input-field">
                    <input class="input" type="text" id="bairro" name="bairro" placeholder="Bairro"/>
                </div>

            </div>

            <div class="input-field">
                <input class="input" type="text" name="obs" placeholder="obsevação"/>
            </div>



            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="main_tela_inicial.php" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>



</body>

</html>