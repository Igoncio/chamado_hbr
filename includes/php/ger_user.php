<?php

use App\Entity\Usuario;

$dados = Usuario::getGer();

$user_lista = '';
foreach ($dados as $user) {
    if ($user['nome'] !== 'anonimo') {
        $user_lista .= '
        <tr>
            <td>' . htmlspecialchars($user['nome']) . '</td>
            <td>' . htmlspecialchars($user['telefone']) . '</td>
            <td>' . htmlspecialchars($user['email']) . '</td>
            <td>' . htmlspecialchars($user['nome_cliente']) . '</td>
            <td>' . htmlspecialchars($user['nome_perfil']) . '</td>
            <td>
                <a href="../pages/main_editar_user.php?id_user=' . htmlspecialchars($user['id_user']) . '">
                    <i class="bi bi-pencil-square" id="edit"></i>
                </a>
                <a href="../pages/main_excluir_user.php?id_user=' . htmlspecialchars($user['id_user']) . '">
                    <button type="button" class="bi bi-trash" id="lixo" name="excluir"></button>
                </a>
            </td>
        </tr>';
    }
}


