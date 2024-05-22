<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_item.php");

?>
<link rel="stylesheet" href="../assets/css/cad_item.css">
<title>cadastrar Equipamento</title>

<body>

    <section class="area-main">

        <form class="area-form" method="POST" action="">

            <h1 id="titulo_page">Cadastrar Equipamento</h1>

            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" name="nome" placeholder="Nome"/>
                </div>

                <div class="input-field">
                    <input class="input" type="text" name="modelo" placeholder="Modelo"/>
                </div>

            </div>

            <select class="select" name="id_categoria">
                <option value="0">selecione a categoria do equipamento</option>
                <?= $options_categoria ?>
            </select>


            <div class="input-field">
                <input class="input" type="text" name="apelido" placeholder="Apelido (como o equipamento vai aparecer no chamado)"/>
            </div>

            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" name="num_patrimonio" placeholder="n° de patrimonio"/>
                </div>

                <div class="input-field">
                    <input class="input" type="text" name="num_serie" placeholder="n° de série"/>
                </div>
            </div>


            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" name="fabricante" placeholder="Fabricante"/>
                </div>
            </div>


                <select class="select" name="id_cli">
                    <option value="0">Selecione o Clinte</option>
                    <?= $options ?>
                </select>

            

                <select class="select" name="id_set">
                    <option value="0">Selecione o Setor</option>
                    <?= $options_setor ?>
                </select>

            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="main_tela_inicial.php" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>



</body>

</html>