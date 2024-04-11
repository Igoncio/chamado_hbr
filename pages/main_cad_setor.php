<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");

use App\Entity\Setor;
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


?>
<link rel="stylesheet" href="../assets/css/cad_setor.css">
<title>cadastrar setor</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Setor</h1>
            
            <label id="label-txt" for="">Selecione o Cliente do setor</label>            
            <select class="select">
                <option value="0">Selecione o Clinte</option>
                <?=$options?>
            </select>

            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o nome</label>
            </div>
            
            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite a descrição</label>
            </div>
            
            
            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>