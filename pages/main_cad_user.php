<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");

use App\Entity\Usuario;

use App\Entity\Cliente;



// Obter a lista de clientes
$clientes = Cliente::getCliente();

$options = '';

// Verificar se a consulta retornou resultados
if ($clientes) {
    // Iterar sobre os resultados
    foreach ($clientes as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options .= '<option class="ops" value="' . $row_check->id_cli . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja clientes encontrados
    $options = '<option value="">Nenhum cliente encontrado</option>';
}


if (isset($_POST["nome"], $_POST["sobrenome"], $_POST["telefone"], $_POST["email"], $_POST["cpf"], $_POST["senha"], $_POST["cliente"])) {

    $objusuario = new Usuario();

    $objusuario -> nome = $_POST["nome"];
    $objusuario -> sobrenome = $_POST["sobrenome"];
    $objusuario -> telefone = $_POST["telefone"];
    $objusuario -> email = $_POST["email"];
    $objusuario -> cpf = $_POST["cpf"];
    $objusuario -> senha = $_POST["senha"];
    $objusuario -> cliente = $_POST["cliente"];

    $objusuario -> cadastrar();

}
?>
<link rel="stylesheet" href="../assets/css/cad_user.css">
<title>cadastrar usuario</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="" method="POST">
            
            <h1 id="titulo_page">Cadastrar Usuário</h1>
            
            <div class="juntar-input">
                
                <div class="input-field">
                    <input required="" class="input" type="text" name="nome"/>
                    <label class="label" for="input">Digite o nome</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="text" name="sobrenome"/>
                    <label class="label" for="input">Digite o sobrenome</label>
                </div>
                
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" name="telefone"/>
                <label class="label" for="input">Digite o telefone</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" name="email"/>
                <label class="label" for="input">Digite o email</label>
            </div>
            
            
            <div class="juntar-input"> 
                
                <div class="input-field">
                    <input required="" class="input" type="text" name="cpf"/>
                    <label class="label" for="input">Digite o cpf</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="password" name="senha"/>
                    <label class="label" for="input">Digite a senha</label>
                </div>
                
            </div>

            
            <div class="select-field"> 
            <label id="label-txt" for="">Selecione o Cliente do setor</label>            
                <select class="select" name="cliente">
                    <option value="0">Selecione o Clinte</option>
                    <?=$options?>
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