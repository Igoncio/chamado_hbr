<?php



use App\Entity\Usuario;


$dados = Usuario::getGer();



// echo '<pre>';
// print_r($user['id_user']);
// echo '</pre>';
// exit;


$user_lista = '';
foreach ($dados as $user) {

    $user_lista .= '
    <tr>
        
    <td>' . $user['nome'] . '</td>
    <td>' . $user['telefone'] . '</td>
    <td>' . $user['email'] . '</td>
    <td>' . $user['nome_cliente'] . '</td>
    <td>' . $user['nome_perfil'] . '</td>
    <td>
        <a href="../pages/main_editar_user.php?id_user=' . $user['id_user'] . '">
            <i class="bi bi-pencil-square" id="edit"></i>
        </a>

        <a href="../pages/main_excluir_user.php?id_user=' . $user['id_user'] . '">
            <button type="button" class="bi bi-trash"id="lixo" name="excluir"></button>
        </a>
    </td>
    </tr> 
    ';



}



