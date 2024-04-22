<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();



// echo '<pre>';
// print_r($user);
// echo '</pre>';
// exit;


$user_lista = '';
foreach($dados as $user){
    


    $user_lista .='
    <tbody>
        
    <td>'.$user['id_chamado'].'</td>
    <td>'.$user['nome_equip'].'</td>
    <td>'.$user['nome_cliente'].'</td>
    <td>'.$user['nome_resp'].'</td>
    <td>'.$user['prioridade'].'</td>
    <td>'.$user['abertura'].'</td>
    <td>'.$user['fechamento'].'</td>
    <td>
    
    </tbody>  
    ';



}



