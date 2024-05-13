<?php



use App\Entity\Item;


$dados = Item::getEquip();



// echo '<pre>';
// print_r($dados);
// echo '</pre>';
// exit;


$user_lista = '';
foreach ($dados as $user) {

    $user_lista .= '
    <tr>
        
        <td>' . $user['apelido'] . '</td>
        <td>' . $user['nome'] . '</td>
        <td>' . $user['num_serie'] . '</td>
        <td>' . $user['cliente'] . '</td>
        <td>' . $user['setor'] . '</td>
        <td>
        <a href="../pages/main_editar_equip.php?id_item=' . $user['id_item'] . '">
            <i class="bi bi-pencil-square" id="edit"></i>
        </a>

        <a href="../pages/main_excluir_equip.php?id_item=' . $user['id_item'] . '">
            <button type="button" class="bi bi-trash"id="lixo" name="excluir"></button>
        </a>
        </td>
    
    </tr>  
    ';



}



