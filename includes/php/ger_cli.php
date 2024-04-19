<?php



use App\Entity\Cliente;


$dados = Cliente::getCliente();





$user_lista = '';
foreach($dados as $user){
    
    // echo '<pre>';
    // print_r($user->nome);
    // echo '</pre>';
    // exit;

    $user_lista .='
            <tbody>
                <tr>
                    <td>'.$user->codigo.'</td>
                    <td>'.$user->nome.'</td>
                    <td>'.$user->telefone.'</td>
                    <td>'.$user->cidade.'</td>
                    <td>'.$user->rua.'</td>
                    <td>'.$user->numero.'</td>
                    <td>
                        <a href="../pages/main_editar_cli.php?id_cli='.$user->id_cli.'">
                            <i class="bi bi-pencil-square" id="edit"></i>
                        </a>

                        <a href="../pages/main_excluir_cli.php?id_cli='.$user->id_cli.'">
                            <button type="button" class="bi bi-trash"id="lixo" name="excluir"></button>
                        </a>


                    </td>
                </tr>
            </tbody>  
    ';



}



