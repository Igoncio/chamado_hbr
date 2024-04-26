<?php

use App\Entity\Chamado;

$dados = Chamado::getChama();


$user_lista = '';
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

                <div class="aa">
                    <a><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>
                    <a href="../pages/main_editar_chama.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-dark">Editar</button></a>
                    <button type="button" class="btn btn-danger">Desativar</button>
                </div>

                </div>
            </div>
    ';

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

            <div class="aa">
                <a><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>
            </div>

            </div>
        </div>
';

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

            <div class="aa">
                <a><button type="button" class="btn btn-primary" id="btnValidar">Validar</button></a>
                <a href="../pages/main_editar_chama.php?id_chamado='.$user['id_chamado'].'"><button type="button" class="btn btn-dark">Editar</button></a>
                <button type="button" class="btn btn-danger">Desativar</button>
            </div>

            </div>
        </div>
';


}



