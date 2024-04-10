<?php

include_once("../includes/menu.php");

?>
<link rel="stylesheet" href="../assets/css/cad_cli.css">
<title>cadastrar cliente</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Cliente</h1>

            <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Codigo</label>
            </div>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o nome</label>
                </div>

            <div class="juntar-input">
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o cnpj</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o telefone</label>
                </div>
            </div>

            
            
            <div class="select-field">
                
                <label id="label-txt" for="">País</label>            
                <select class="select">
                    <option>Brasil</option>
                    <option>Chile</option>
                    <option>Paraguay</option>
                </select>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">cidade</label>
                </div>

            </div>
            

            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label id="cep" class="label" for="input">CEP</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label id="cep" class="label" for="input">Numero</label>
                </div>


            </div>

            
            <div class="juntar-input">
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Endereço</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Bairro</label>
                </div>

            </div>

            <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">observação</label>
            </div>
            
    

            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>