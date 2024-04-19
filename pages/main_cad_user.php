<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");
include_once("../includes/php/cad_user.php");

?>
<link rel="stylesheet" href="../assets/css/cad_user.css">
<title>cadastrar usuario</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="" method="POST">
            
            <h1 id="titulo_page">Cadastrar Usuário</h1>
            
            <div class="juntar-input">
                
                <div class="input-field">
                    <input  class="input" type="text" name="nome"/>
                    <label class="label" for="input">Digite o nome</label>
                </div>
                
                <div class="input-field">
                    <input  class="input" type="text" name="sobrenome"/>
                    <label class="label" for="input">Digite o sobrenome</label>
                </div>
                
            </div>
            
            <div class="input-field">
                <input  class="input" type="text" name="telefone"/>
                <label class="label" for="input">Digite o telefone</label>
            </div>
            
            <div class="input-field">
                <input  class="input" type="text" name="email"/>
                <label class="label" for="input">Digite o email</label>
            </div>
            
                 
            <div class="input-field">
                <input  class="input" type="password" name="senha"/>
                <label class="label" for="input">Digite a senha</label>
            </div>


  

            <select class="select" name="perfil">
                <option value="0">Selecione o Perfil</option>
                <?=$options_perf?>
            </select>
    
            <select class="select" name="cliente">
                <option value="0">Selecione o Local</option>
                <?=$options?>
            </select>

            <label>
                Ativo
                <input checked name="status" type="radio" value="ativo" required/>
            </label>


            <label>
                Desligado
                <input name="status" type="radio" value="desligado" required/>
            </label>
     


            <div class="btn-field">
                
                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">
                
            </div>
            
            

        </form>
        
        
    </section>
    
</body>
</html>