<?php



use App\Entity\Perfil;


$dados = Perfil::getPerfil();



// echo '<pre>';
// print_r($user->nome);
// echo '</pre>';
// exit;


$user_lista = '';
foreach ($dados as $user) {

    $user_lista .= '
    <tr>
        
    <td>' . $user->nome . '</td>
    <td>
    <a href="../pages/main_editar_perf.php?id_perf=' . $user->id_perf . '">
        <i class="bi bi-pencil-square" id="edit"></i>
    </a>

    <a href="../pages/main_excluir_perf.php?id_perf=' . $user->id_perf . '">
        <button type="button" class="bi bi-trash"id="lixo" name="excluir"></button>
    </a>
    </td>
    
    </tr>  
    ';



}



