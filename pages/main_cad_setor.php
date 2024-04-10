<?php

include_once("../includes/menu.php");

?>
<link rel="stylesheet" href="../assets/css/cad_setor.css">
<title>cadastrar setor</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Setor</h1>
            
            <label id="label-txt" for="">Selecione o Cliente do setor</label>            
            <select class="select">
                <option>Selecione um cliente</option>
                <option>Moreninha</option>
                <option>Universitario</option>
            </select>

            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o nome</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" />
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