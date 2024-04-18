<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/editar_equip.php");

?>
<link rel="stylesheet" href="../assets/css/cad_item.css">
<title>cadastrar item</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" method="POST" action="">
            
            <h1 id="titulo_page">Cadastrar Equipamento</h1>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" name="nome" value="<?php echo $objitens->nome?>"/>
                    <label class="label" for="input">Digite o nome</label>
                </div>
                
                <div class="input-field">
                    <input  class="input" type="text" name="modelo" value="<?php echo $objitens->modelo?>"/>
                    <label class="label" for="input">Digite o modelo</label>
                </div>

            </div>
                     
            <select class="select" name="id_categoria">      
                <option value="<?php echo $categorias[$objitens->id_categoria - 1]->id_categoria;?>"><?php echo $categorias[$objitens->id_categoria - 1]->nome; ?></option>
                <?=$options_categoria?>
            </select>

            
            <div class="input-field">
                <input  class="input" type="text" name="apelido" value="<?php echo $objitens->apelido?>"/>
                <label class="label" for="input">Digite o apelido (como o equipamento ira aparecer no chamado)</label>
            </div>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input  class="input" type="text" name="num_patrimonio" value="<?php echo $objitens->num_patrimonio?>"/>
                    <label class="label" for="input">n° de patrimonio</label>
                </div>
                
                <div class="input-field">
                    <input  class="input" type="text" name="num_serie" value="<?php echo $objitens->num_serie?>"/>
                    <label class="label" for="input">n° de série</label>
                </div>
            </div>


            <div class="juntar-input"> 

                <div class="input-field">
                    <input  class="input" type="text" name="fabricante" value="<?php echo $objitens->fabricante?>"/>
                    <label class="label" for="input">Fabricante</label>
                </div>
            </div>


            <div class="select-field">            
                <select class="select" name="id_cli">
                <option value="<?php echo $clientes[$objitens->id_cli-1]->id_cli;?>"><?php echo $clientes[$objitens->id_cli-1]->nome; ?></option>
                    <?=$options?>
                </select>
           
                
                <select class="select" name="id_set">
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