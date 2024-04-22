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
    <tbody id="linha">
        
        <td id="nome_cli">'.$user['id_chamado'].'</td>
        <td id="nome_cli">'.$user['nome_equip'].'</td>
        <td id="nome_cli">'.$user['nome_cliente'].'</td>
        <td id="nome_cli">'.$user['nome_resp'].'</td>
        <td id="nome_cli">'.$user['prioridade'].'</td>
        <td id="nome_cli">'.$user['abertura'].'</td>
        <td id="nome_cli">'.$user['fechamento'].'</td>
        <td>
        
    </tbody>  
    ';



}



