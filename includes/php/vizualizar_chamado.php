<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();


$user_lista = '';
foreach($dados as $user){
    


    $user_lista .='
    <tbody id="linha">
        
        <td>'.$user['id_chamado'].'</td>
        <td>'.$user['nome_equip'].'</td>
        <td>'.$user['nome_cliente'].'</td>
        <td>'.$user['nome_resp'].'</td>
        <td>'.$user['nome_solicitante'].'</td>
        <td>'.$user['prioridade'].'</td>
        <td>'.$user['tipo'].'</td>
        <td>'.$user['status'].'</td>
        <td>'.$user['abertura'].'</td>
        <td>'.$user['fechamento'].'</td>
        
        
    </tbody>  
    ';



}



