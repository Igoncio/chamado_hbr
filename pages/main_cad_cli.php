<?php

require_once __DIR__ . '/../vendor/autoload.php';


include_once("../includes/menu.php");

use App\Entity\Cliente;

if (isset($_POST["codigo"], $_POST["nome"], $_POST["telefone"], $_POST["cnpj"], $_POST["pais"], $_POST["cep"], $_POST["cidade"], $_POST["estado"], $_POST["numero"], $_POST["rua"], $_POST["bairro"], $_POST["obs"])) {

    $objcliente = new Cliente();

    
    $objcliente->codigo = $_POST["codigo"];
    $objcliente->nome = $_POST["nome"];
    $objcliente->telefone = $_POST["telefone"];
    $objcliente->cnpj = $_POST["cnpj"];
    $objcliente->pais = $_POST["pais"];
    $objcliente->cep = $_POST["cep"];
    $objcliente->cidade = $_POST["cidade"];
    $objcliente->estado = $_POST["estado"];
    $objcliente->numero = $_POST["numero"];
    $objcliente->rua = $_POST["rua"];
    $objcliente->bairro = $_POST["bairro"];
    $objcliente->observacao = $_POST["obs"];
    

    $objcliente->cadastrar();
}

?>
<link rel="stylesheet" href="../assets/css/cad_cli.css">
<script src="../assets/js/cad_cli.js" defer></script>
<title>cadastrar cliente</title>
<body>
    
    <section class="area-main">
        <span id="message"></span>
        <form class="area-form" id="form-cli" method="POST" action="">
            
            <h1 id="titulo_page">Cadastrar Cliente</h1>
            
            <div class="input-field">
                <input required="" class="input" name="codigo" type="text" />
                    <label class="label" for="input">Codigo</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input"name="nome" type="text" />
                <label class="label" for="input">Digite o nome</label>
            </div>
            
            <div class="juntar-input">
                <div class="input-field">
                    <input required="" class="input" name="cnpj" type="text" />
                    <label class="label" for="input">Digite o cnpj</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" name="telefone" type="text" />
                    <label class="label" for="input">Digite o telefone</label>
                </div>
            </div>
            
            
            
            <div class="select-field">
                
                <label id="label-txt" for="">País</label>            
                <select class="select" name="pais">
                    <option>Brasil</option>
                    <option>Chile</option>
                    <option>Paraguay</option>
                </select>
                
                <div class="input-field">
                    <input required="" class="input" type="text" id="cep" name="cep" placeholder=""/>
                    <label  class="label" for="input">CEP</label>
                </div>
                
            </div>

            <div class="juntar-input">
                
                <div class="input-field">
                    <input required="" class="input" type="text" id="cidade" name="cidade" placeholder=""/>
                    <label class="label" id="cidade" for="input">cidade</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input"  type="text" id="estado" name="estado" placeholder=""/>
                    <label class="label"  for="input">Estado</label>
                </div>


                <div class="input-field">
                    <input required="" class="input" name="numero" type="text"/>
                    <label class="label" for="input">Numero</label>
                </div>
                
                
            </div>
            
            
            <div class="juntar-input">
                <div class="input-field">
                    <input required="" class="input" type="text" id="rua" name="rua" placeholder=""/>
                    <label class="label"  for="input">Rua</label>
                </div>

                <div class="input-field">
                    <input required="" class="input" type="text" id="bairro" name="bairro" placeholder=""/>
                    <label class="label"  for="input">Bairro</label>
                </div>

            </div>

            <div class="input-field">
                    <input required="" class="input" type="text" name="obs"/>
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