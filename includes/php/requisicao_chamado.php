<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();

$user_lista = '';
$user_table = '';
foreach($dados as $user){
    
if($user['prioridade']=="baixa" and $user['status']=="nao_visto")
    $user_lista .='   
    <div class="card1">
                <div class="notiglow1"></div>
                <div class="notiborderglow1"></div>
                <div class="notititle1">Chamado '.$user['id_chamado'].'</div>
                <div class="notibody1">
                    Requisitante: '.$user['nome_solicitante'].'<br>
                    Abertura: '.$user['abertura'].'<br><br>
                    Equipamento(s): '.$user['nome_equip'].'<br>
                
                    Tipo: '.$user['tipo'].'<br>

                    Prioridade: '.$user['prioridade'].'<br><br>

                    descrição: '.$user['descricao'].'<br><br>

                    Responsável: '.$user['nome_resp'].'<br>
                    Cliente: '.$user['nome_cliente'].'<br> 

                    
                    <a href="../includes/php/aceitar_chamado.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button></a>
                    <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                    <button type="button" class="btn btn-danger">Desativar</button>
                    </div>
                    </div>
                    ';
                    
                    // <a href="../pages/main_validar_os.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>
                    if($user['prioridade']=="media" and $user['status']=="nao_visto")
            $user_lista .='   
            <div class="card3">
            <div class="notiglow3"></div>
            <div class="notiborderglow3"></div>
            <div class="notititle3">Chamado '.$user['id_chamado'].'</div>
            <div class="notibody3">
                Requisitante: '.$user['nome_solicitante'].'<br>
                Abertura: '.$user['abertura'].'<br><br>
                Equipamento(s): '.$user['nome_equip'].'<br>
            
                Tipo: '.$user['tipo'].'<br>

                Prioridade: '.$user['prioridade'].'<br><br>

                descrição: '.$user['descricao'].'<br><br>

                Responsável: '.$user['nome_resp'].'<br>
                Cliente: '.$user['nome_cliente'].'<br> 

                <a href="../includes/php/aceitar_chamado.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>
                
                </div>
                </div>
                ';
                
                // <a href="../pages/main_validar_os.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>
if($user['prioridade']=="alta" and $user['status']=="nao_visto")
$user_lista .='   
            <div class="card2">
            <div class="notiglow2"></div>
            <div class="notiborderglow2"></div>
            <div class="notititle2">Chamado '.$user['id_chamado'].'</div>
            <div class="notibody2">
                Requisitante: '.$user['nome_solicitante'].'<br>
                Abertura: '.$user['abertura'].'<br><br>
                Equipamento(s): '.$user['nome_equip'].'<br>
            
                Tipo: '.$user['tipo'].'<br>

                Prioridade: '.$user['prioridade'].'<br><br>

                descrição: '.$user['descricao'].'<br><br>

                Responsável: '.$user['nome_resp'].'<br>
                Cliente: '.$user['nome_cliente'].'<br> 

                <a href="../includes/php/aceitar_chamado.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>
                
                </div>
                </div>
                ';
                
                // <a href="../pages/main_validar_os.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>





if ($user['status'] == "nao_visto") {
    // Limita a descrição para 140 caracteres
    $descricao = (!empty($user['descricao']) ? (strlen($user['descricao']) > 140 ? substr($user['descricao'], 0, 140) . '...' : $user['descricao']) : 'campo vazio');

    $user_table .= '
            <tr>
                <td>' . (!empty($user['id_chamado']) ? $user['id_chamado'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_solicitante']) ? $user['nome_solicitante'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['abertura']) ? $user['abertura'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_equip']) ? $user['nome_equip'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['tipo']) ? $user['tipo'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['prioridade']) ? $user['prioridade'] : 'campo vazio') . '</td>
                <td>' . $descricao . '</td>
                <td>' . (!empty($user['nome_resp']) ? $user['nome_resp'] : 'campo vazio') . '</td>
                <td>' . (!empty($user['nome_cliente']) ? $user['nome_cliente'] : 'campo vazio') . '</td>
                <td>
                <a href="../includes/php/aceitar_chamado.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-primary" name="aceitar" id="btnAceitar">Aceitar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>
                </td>
                </tr>';
            }
            
            // <a href="../pages/main_validar_os.php?id_chamado=' . $user['id_chamado'] . '"><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>


}




