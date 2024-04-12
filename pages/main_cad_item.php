<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/cad_item.php");

?>
<link rel="stylesheet" href="../assets/css/cad_item.css">
<title>cadastrar item</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Item</h1>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o nome</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o modelo</label>
                </div>

            </div>
                     
            <select class="select" name="categoria">
                <option value="0">selecione a categoria do item</option>
                <?=$options_categoria?>
            </select>

            
            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o apelido (como o item ira aparecer no chamado)</label>
            </div>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">n° de patrimonio</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">n° de série</label>
                </div>
            </div>


            <div class="juntar-input"> 

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Fabricante</label>
                </div>
            </div>


            <div class="select-field">            
                <select class="select" name="cliente">
                    <option value="0">Selecione o Clinte</option>
                    <?=$options?>
                </select>
           
                
                <select class="select" name="setor">
                    <option value="0">Selecione o Setor</option>
                    <?=$options_setor?>
                </select>

            </div>

            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>