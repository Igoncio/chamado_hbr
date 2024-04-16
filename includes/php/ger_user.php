<?php

use App\Entity\Usuario;

$users = "";
$dados = Usuario::getGer();

// echo '<pre>';
// print_r($dados);
// echo '</pre>';
// exit;

$user_lista = '';
foreach($dados as $user){

    
    $user_lista .='
    <div class="tbl-content">
    <tbody class="area-linha">
        
    <td>'.$user['nome'].'</td>
    <td>'.$user['telefone'].'</td>
    <td>'.$user['email'].'</td>
    <td>'.$user['nome_cliente'].'</td>
    <td>'.$user['nome_perfil'].'</td>
    <td>
        <i class="bi bi-pencil-square" id="edit"></i>
        <i class="bi bi-trash"id="lixo"></i>
    </td>
    
    </tbody>
    </div>    
    ';
    
}

