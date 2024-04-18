<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/editar_user.php");

?>
<link rel="stylesheet" href="../assets/css/excluir_user.css">
<title>cadastrar usuario</title>
<body>
    
    

    <section class="area-main">
        
        <form class="area-form" action="" method="POST">
            
            <h1 id="titulo_page">Excluir Usuário</h1>
            
            <div class="juntar-input">
                
                <div class="input-field">
                  <label class="label" for="input"><?php echo $objuser->nome ?></label>
                    <input  readonly class="input" type="text" name="nome"/>
                </div>
                
                <div class="input-field">
                  <label class="label" for="input"><?php echo $objuser->sobrenome?></label>
                    <input readonly class="input" type="text" name="sobrenome"/>
                </div>
                
            </div>
            
            <div class="input-field">
              <label class="label" for="input"><?php echo $objuser->telefone ?></label>
                <input readonly class="input" type="text" name="telefone"/>
            </div>
            
            <div class="input-field">
                <label class="label" for="input">"<?php echo $objuser->email?>"</label>
                <input readonly class="input" type="text" name="email"/>
            </div>

            <select class="select" name="perfil">
                <option value="<?php echo $perfis[$objuser->perfil - 1]->id_perf;?>"><?php echo $perfis[$objuser->perfil - 1]->nome; ?></option>
            </select>
            
            
            <select class="select" name="cliente">
                
                <option value="<?php echo $clientes[$objuser->cliente - 1]->id_cli; ?>">
                <?php echo $clientes[$objuser->cliente - 1]->nome; ?>
                </option>
            </select>

            <span id="texto-alert">obs: Ao excluir um usuario não tem como voltar a ação, então apenas exclua caso tiver a certeza</span>

            <div class="btn-field">
                
                <button type="submit" style="hiddden" name="excluir" class="btn btn-danger">Excluir</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">
                
            </div>
            
            
        </form>
        
        
    </section>
    
</body>
</html>
      

    
 