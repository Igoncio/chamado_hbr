<?php

include_once("../includes/menu.php");

?>
<link rel="stylesheet" href="../assets/css/cad_user.css">
<title>cadastrar usuario</title>
<body>

    <h1 id="titulo_page">Cadastrar Usuários </h1>
    <section>

        <form class="area-form" action="">

            <div id="area-input">
                <label for="">Nome</label>
                <input type="text" placeholder="Digite o nome">
            </div>

            <div id="area-input">
                <label for="">Sobrenome</label>
                <input type="text" placeholder="Digite o sobrenome">
            </div>

            <div id="area-input">
                <label for="">Telefone</label>
                <input type="text" placeholder="Digite o telefone">
            </div>

            <div id="area-input">
                <label for="">Email</label>
                <input type="text" placeholder="Digite o email">
            </div>

            <div id="area-input">
                <label for="">CPF</label>
                <input type="text" placeholder="Digite o cpf">
            </div>

            <div id="area-input">            
                <select>
                    <option selected>Selecione o local</option>
                    <option>Upa Universitario</option>
                    <option>Moreninha</option>
                    <option>Dourados</option>
                </select>
            </div>



        </form>


    </section>


    
</body>
</html>