<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");

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
<link rel="stylesheet" href="../assets/css/cad_item.css">
<title>cadastrar item</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Item</h1>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o nome</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Digite o modelo</label>
                </div>

            </div>
            
            <label id="label-txt" for="">Selecione a categoria do item</label>            
            <select class="select">
                <option>selecione a categoria</option>
                <option>ar Condicionado</option>
                <option>servidor</option>
                <option>monitor</option>
            </select>
            <div class="input-field">
                <input required="" class="input" type="text" />
                <label class="label" for="input">Digite o apelido (como o item ira aparecer no chamado)</label>
            </div>
            
            <div class="juntar-input">

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">n° de patrimonio</label>
                </div>
                
                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">n° de série</label>
                </div>
            </div>


            <div class="juntar-input"> 

                <div class="input-field">
                    <input required="" class="input" type="text" />
                    <label class="label" for="input">Fabricante</label>
                </div>
            </div>


            <div class="select-field"> 
                <label id="label-txt" for="">Selecione o Cliente do setor</label>            
                <select class="select" name="cliente">
                    <option value="0">Selecione o Clinte</option>
                    <?=$options?>
                </select>

                <label id="label-txt" for="">Selecione o setor do item</label>            
                <select class="select">
                    <option>selecione o setor</option>
                    <option>Setor de enfermagem</option>
                    <option>Setor de documentação</option>
                    <option>Setor de lojistica</option>
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