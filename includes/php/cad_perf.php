<?php

use App\Entity\Perfil;

if (isset($_POST["nome"])) {

    $objperfil = new Perfil();

    $objperfil -> nome = $_POST["nome"];
    
    $objperfil -> cadastrar();

}