<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/cad_chama.php");



?>
<link rel="stylesheet" href="../assets/css/cad_chama.css">
<title>cadastrar chamado</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" method="POST" action="">
            
            <h1 id="titulo_page">Cadastrar Chamado</h1>
            
            <div class="juntar-input">  
                
                <div class="data-field">
                    <input required="" class="input" type="date" name="abertura"/>
                    <label>Selecione a data de abertura</label>
                </div>
                
                <div class="data-field">
                    <input required="" class="input" type="date" name="fechamento"/>
                    <label>Selecione a data de parada</label>
                </div>
                
            </div>

            <div class="select-field">

            <div>
                <select class="select" name="id_user">
                    <option value="0">Selecione o usuario</option>
                    <?=$options_user?>>
                </select>
            </div>


            <select class="select" name="id_cli">
                <option value="0">Selecione o Clinte</option>
                <?=$options?>
            </select>

            </div>
           

            <div class="select-field">

                <div>
                    <label id="label-txt" for=""></label>            
                    <select class="select" name="id_cat">
                        <option value="0">Selecione a categoria</option>
                        <?=$options_categoria?>>
                    </select>
                </div>


                <div>
                <div>
                    <label id="label-txt" for=""></label>            
                    <select class="select" name="id_item">
                        <option value="0">Selecione o item</option>
                        <?=$options_item?>>
                    </select>
                </div>

                </div>

            </div>

            
            <select class="select" name="id_set">
                <option value="0">Selecione o Setor</option>
                <?=$options_setor?>>
            </select>





            <div class="input-field">
                <input required="" id="desc" class="input" type="text" name="descricao"/>
                <label class="label" for="input">Descrição</label>
            </div>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" name="num_patrimonio"/>
                    <label class="label" for="input">n° de patrimonio</label>
                </div>
                
                <div class="input-field">
                    <input class="input" type="text" name="num_serie"/>
                    <label class="label" for="input">n° de série</label>
                </div>
            </div>

            <div class="juntar-check">

                <h1 id="txt-perm">Prioridade:</h1>
                <div class="area-prioridade">
                    <label>
                        BAIXA
                        <input id="ant" name="prioridade" type="radio" value="baixa" required/>
                    </label>
                </div>

                <div class="area-prioridade">
                    <label>
                        MEDIA
                        <input id="grade" name="prioridade" type="radio" value="media" required/>
                    </label>  
                </div>

                <div class="area-prioridade">
                    <label>
                        ALTA
                        <input id="novo" name="prioridade" type="radio" value="alta" required/>
                    </label>
                </div>

            

            <h1 id="txt-perm">Tire uma foto (opicional):</h1>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
            </div>





            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>