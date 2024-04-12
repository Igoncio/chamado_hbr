<?php

use App\Entity\Categoria;

if (isset($_POST["nome"])) {

    $objusuario = new Categoria();

    $objusuario -> nome = $_POST["nome"];
    
    $objusuario -> cadastrar();

}