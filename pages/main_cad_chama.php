<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once("../includes/menu.php");

use App\Entity\Cliente;
use App\Entity\Setor;
use App\Entity\Categoria;


$clientes = Cliente::getCliente();
$setores = Setor::getSetor();
$categorias = Categoria::getCategoria();   

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



$options_setor = '';

// Verificar se a consulta retornou resultados
if ($setores) {
    // Iterar sobre os resultados
    foreach ($setores as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_setor .= '<option class="ops" value="' . $row_check->id_set . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_setor = '<option value="">Nenhum cliente encontrado</option>';
}



$options_categoria = '';

// Verificar se a consulta retornou resultados
if ($categorias) {
    // Iterar sobre os resultados
    foreach ($categorias as $row_check) {
        // Acessar as propriedades do objeto Cliente diretamente
        $options_categoria .= '<option class="ops" value="' . $row_check->id_categoria . '"> ' . $row_check->nome . ' </option>';
    }
} else {
    // Caso não haja setores encontrados
    $options_categoria = '<option value="">Nenhum cliente encontrado</option>';
}


?>
<link rel="stylesheet" href="../assets/css/cad_chama.css">
<title>cadastrar chamado</title>
<body>
    
    <section class="area-main">
        
        <form class="area-form" action="">
            
            <h1 id="titulo_page">Cadastrar Chamado</h1>
            
            <div class="juntar-input">  
                
                <div class="data-field">
                    <input required="" class="input" type="date" />
                    <label>Selecione a data de abertura</label>
                </div>
                
                <div class="data-field">
                    <input required="" class="input" type="date" />
                    <label>Selecione a data de parada</label>
                </div>
                
            </div>


            <label id="label-txt" for="">Selecione o Cliente do setor</label>            
            <select class="select" name="cliente">
                <option value="0">Selecione o Clinte</option>
                <?=$options?>
            </select>

            <label id="label-txt" for=""></label>            
            <select class="select">
                <option value="0">Selecione o Setor</option>
                <?=$options_setor?>>
            </select>


            <label id="label-txt" for=""></label>            
            <select class="select">
                <option value="0">Selecione a categoria</option>
                <?=$options_categoria?>>
            </select>

            <div class="select-field">

                <div class="area-select">
                    <label id="label-txt" for=""></label>            
                    <select class="select">
                        <option>selecione o responsavel</option>
                        <option>Setor de enfermagem</option>
                        <option>Setor de documentação</option>
                        <option>Setor de lojistica</option>
                    </select>
                </div>
    
                    <div class="area-select">
                        <label id="label-txt" for=""></label>            
                        <select class="select">
                            <option>selecione o segundo responsavel</option>
                            <option>Setor de enfermagem</option>
                            <option>Setor de documentação</option>
                            <option>Setor de lojistica</option>
                        </select>
                    </div>

                </div>
            
            </div>

            <div class="input-field">
                <input required="" id="desc" class="input" type="text"/>
                <label class="label" for="input">Descrição</label>
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

            <div class="juntar-check">

                <h1 id="txt-perm">Prioridade:</h1>
                <div class="area-prioridade">
                    <label>
                        BAIXA
                        <input id="ant" name="base" type="radio" value="S" />
                    </label>
                </div>

                <div class="area-prioridade">
                <label>
                    MEDIA
                    <input id="grade" name="base" type="radio" value="S" />
                </label>  
                </div>

                <div class="area-prioridade">
                <label>
                    ALTA
                    <input id="novo" name="base" type="radio" value="S" />
                </label>
                </div>
            </div>
            

            <h1 id="txt-perm">Tire uma foto (opicional):</h1>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
            </div>





            <div class="btn-field">

                <button class="btn-submit" type="submit">Cadastrar</button>
                <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

            </div>


        </form>


    </section>


    
</body>
</html>