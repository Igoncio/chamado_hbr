<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/cad_setor.php");

?>
<link rel="stylesheet" href="../assets/css/cad_setor.css">
<title>cadastrar setor</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" method="POST" action="">
            
            <h1 id="titulo_page">Cadastrar Setor</h1>
            
            <label id="label-txt" for="">Selecione o Cliente do setor</label>            
            <select class="select" name="id_cli">
                <option value="0">Selecione o Clinte</option>
                <?=$options?>
            </select>

            <div class="input-field">
                <input required="" class="input" type="text" name="nome"/>
                <label class="label" for="input">Digite o nome</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" name="descricao"/>
                <label class="label" for="input">Digite a descrição</label>
            </div>
            
            
            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>