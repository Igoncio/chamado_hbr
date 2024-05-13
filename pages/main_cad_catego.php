<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_catego.php");


?>
<link rel="stylesheet" href="../assets/css/cad_catego.css">
<title>cadastrar categoria</title>

<body>

    <section class="area-main">

        <form class="area-form" method="POST" action="">

            <h1 id="titulo_page">Cadastrar Categoria</h1>


            <div class="input-field">
                <input required="" class="input" type="text" name="nome" />
                <label class="label" for="input">Digite o nome da categoria</label>
            </div>


            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>



</body>

</html>