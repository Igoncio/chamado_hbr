<?php

include_once("../includes/menu.php");

?>
<link rel="stylesheet" href="../assets/css/cad_user.css">
<title>cadastrar usuario</title>
<body>

    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Usuários </h1>
           
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o nome</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o sobrenome</label>
                </div>

            </div>

            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o telefone</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o email</label>
            </div>


            <div class="juntar-input"> 

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o cpf</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="password" />
                    <label class="label" for="input">Digite a senha</label>
                </div>

            </div>


            <div class="select-field"> 
                <label id="label-txt" for="">Selecione o local onde o usurio trabalha</label>            
                <select>
                    <option>Selecione o local</option>
                    <option>Upa Universitario</option>
                    <option>Moreninha</option>
                    <option>Dourados</option>
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