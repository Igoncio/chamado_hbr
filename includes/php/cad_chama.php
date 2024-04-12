<?php

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