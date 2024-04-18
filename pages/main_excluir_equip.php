<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/editar_equip.php");
include_once("../includes/php/excluir_equip.php");


?>
<link rel="stylesheet" href="../assets/css/cad_item.css">
<title>excluir equipamento</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" method="POST" action="">
            
            <h1 id="titulo_page">Excluir Equipamento</h1>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input readonly class="input" type="text" name="nome" value="<?php echo $objitens->nome?>"/>
                </div>
                
                <div class="input-field">
                    <input readonly  class="input" type="text" name="modelo" value="<?php echo $objitens->modelo?>"/>
                </div>

            </div>
                     
            <select class="select" name="id_categoria">      
                <option value="<?php echo $categorias[$objitens->id_categoria - 1]->id_categoria;?>"><?php echo $categorias[$objitens->id_categoria - 1]->nome; ?></option>
            </select>

            
            <div class="input-field">
                <input  readonly class="input" type="text" name="apelido" value="<?php echo $objitens->apelido?>"/>
            </div>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input  readonly class="input" type="text" name="num_patrimonio" value="<?php echo $objitens->num_patrimonio?>"/>
                </div>
                
                <div class="input-field">
                    <input readonly  class="input" type="text" name="num_serie" value="<?php echo $objitens->num_serie?>"/>
                </div>
            </div>


            <div class="juntar-input"> 

                <div class="input-field">
                    <input readonly class="input" type="text" name="fabricante" value="<?php echo $objitens->fabricante?>"/>
                </div>
            </div>


            <div class="select-field">            
                <select class="select" name="id_cli">
                <option value="<?php echo $clientes[$objitens->id_cli-1]->id_cli;?>"><?php echo $clientes[$objitens->id_cli-1]->nome; ?></option>
                </select>

                <select class="select" name="id_set">
                    <option value="<?php echo $setores[$objitens->id_set-4]->id_set;?>"><?php echo $setores[$objitens->id_set-4]->nome;?></option>              
                </select>

            </div>

            <span id="texto-alert">obs: Ao excluir um usuario não tem como voltar a ação, então apenas exclua caso tiver a certeza</span>

            <div class="btn-field">
                
                <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">
                
            </div>
            
            
        </form>
        
        
    </section>
    
</body>
</html>
      

    
 