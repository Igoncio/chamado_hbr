<?php

include_once ("../includes/menu.php");

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/php/tela_inicial.php");

use App\Entity\Usuario;
use App\Entity\Perfil;

$dados = $objUsuario->getPermissao($_SESSION['id_user']);

// print_r($dados->cad_cli);
// die;

$cad_cli = $dados->cad_cli == '1';
$cad_perf = $dados->cad_perf == '1';
$cad_chama = $dados->cad_chama == '1';
$cad_equip = $dados->cad_equip == '1';
$cad_user = $dados->cad_user == '1';
$vizu_chama = $dados->vizu_chama == '1';
$todas_os = $dados->todas_os == '1';
$ger_perf = $dados->ger_perf == '1';
$ger_user = $dados->ger_user == '1';
$ger_equip = $dados->ger_equip == '1';
$ger_cli = $dados->ger_cli == '1';
$req_chama = $dados->req_chama == '1';
$aceitar_recusar_chama = $dados->aceitar_recusar_chama == '1';
$edit_chama = $dados->edit_chama == '1';
$relatorio_chama = $dados->relatorio_chama == '1';
$resp_os = $dados->resp_os == '1';
$edit_os = $dados->edit_os == '1';
$relatorio_os = $dados->relatorio_os == '1';

?>
<link rel="stylesheet" href="../assets/css/tela_inicial.css">
<title>tela inicial</title>

<body>

    <h1 id="titulo_page">Tela Inicial</h1>

    
    <section class="area-main">
    <?php
        if ($cad_chama == 1 || $cad_cli == 1 || $cad_equip == 1 ||  $cad_perf == 1 || $cad_user == 1) {
        ?>
            <section class="area-cad">
                <h1 id="txt-area">Cadastros</h1>
                <?php
                echo $cad_cli ? '<a href="main_cad_cli.php">
                    <div class="card1">
                        <div class="notiglow1"></div>
                        <div class="notiborderglow1"></div>
                        <div class="notititle1">Cadastrar Cliente</div>
                        <div class="notibody1">Selecione esta opção para cadastrar um cliente</div>
                    </div>
                </a>' : '';

                echo $cad_perf ? '<a href="main_cad_perf.php">
                    <div class="card1">
                        <div class="notiglow1"></div>
                        <div class="notiborderglow1"></div>
                        <div class="notititle1">Cadastrar Perfil</div>
                        <div class="notibody1">Selecione esta opção para cadastrar um perfil</div>
                    </div>
                </a>' : '';

                echo $cad_user ? '<a href="main_cad_user.php">
                    <div class="card1">
                        <div class="notiglow1"></div>
                        <div class="notiborderglow1"></div>
                        <div class="notititle1">Cadastrar Usuário</div>
                        <div class="notibody1">Selecione esta opção para cadastrar um usuário</div>
                    </div>
                </a>' : '';

                echo $cad_equip ? '<a href="main_cad_item.php">
                    <div class="card1">
                        <div class="notiglow1"></div>
                        <div class="notiborderglow1"></div>
                        <div class="notititle1">Cadastrar Equipamento</div>
                        <div class="notibody1">Selecione esta opção para cadastrar qualquer equipamento (ex: Lenovo Ideapad, monitor Dell 24 pol, etc...)</div>
                    </div>
                </a>' : '';

                echo $cad_chama ? '<a href="main_cad_chama.php">
                    <div class="card1">
                        <div class="notiglow1"></div>
                        <div class="notiborderglow1"></div>
                        <div class="notititle1">Cadastrar Chamado</div>
                        <div class="notibody1">Selecione esta opção para cadastrar um chamado</div>
                    </div>
                </a>' : '';
                ?>
            </section>
        <?php
        }
        ?>



        <section class="area-chamado">
            <h1 id="txt-area">Chamados</h1>


            <?php
            echo $vizu_chama ?
            '<a href="main_vizualizar_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Todos chamados</div>
                    <div class="notibody1">Selecione esta opção para vizualizar os chamados criados por todos usuarios
                    </div>
                </div>
            </a>'
            :'';
            ?>

            <a href="main_seus_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Seus Chamados</div>
                    <div class="notibody1">Selecione esta opção para ver as atualizações de chamados criados por você
                    </div>
                </div>
            </a>


            <?php 
            echo $req_chama ?
            '<a href="main_requisicao_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Requisições de Chamados</div>
                    <div class="notibody1">Selecione esta opção para validar os chamados já criados</div>
                </div>
            </a>'
            :'';
            ?>

            <?php
            echo $relatorio_chama ?
            '<a href="main_relatorio_chama.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Relatório de chamados</div>
                    <div class="notibody1">Selecione esta opção para vizualizar o relatório dos chamados</div>
                </div>
            </a>'
            :'';
            ?>

            <?php
            echo $cad_chama ?
            '<a href="main_cad_chama.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar Chamado</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um chamado</div>
                </div>
            </a>'
            :'';
            ?>


        </section>

        <section class="area-chamado">

            <h1 id="txt-area">Ordens de Serviço</h1>

            <?php
            echo $todas_os ?
            '<a href="main_todas_os.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Todas Os</div>
                    <div class="notibody1">Selecione esta opção para vizualizar e responder a todas ordens de seviço
                    </div>
                </div>
            </a>'
            :'';
            ?>

            <a href="main_suas_os.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Suas Os</div>
                    <div class="notibody1">Selecione esta opção para responder as ordens de serviço encaminhadas a você
                    </div>
                </div>
            </a>
    

            <?php
            echo $relatorio_os ?
            '<a href="main_relatorio_os.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Relatório de OS</div>
                    <div class="notibody1">Selecione esta opção para vizualizar o relatório dos chamados</div>
                </div>
            </a>'
            :'';
            ?>

        </section>



        <section class="area-gerenciar">
        <?php 
        if($ger_user == 1 || $ger_perf == 1 || $ger_equip == 1 || $ger_cli == 1){
        ?>
            <h1 id="txt-area">Gerenciamento</h1>

            <?php
            echo $ger_user ?
            '<a href="main_ger_user.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar usuário</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer usuário</div>
                </div>
            </a>'
            :'';
            ?>


            <?php
            echo $ger_perf ?
            '<a href="main_ger_perf.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar perfil</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer perfil</div>
                </div>
            </a>'
            :'';
            ?>

            <?php
            echo $ger_equip ?
            '<a href="main_ger_equip.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar equipamento</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer equipamento</div>
                </div>
            </a>'
            :'';
            ?>

            <?php
            echo $ger_cli ?
            '<a href="main_ger_cli.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar Cliente</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer Cliente</div>
                </div>
            </a>'
            :'';
            ?>
        </section>
        <?php
        }
        ?>
    </section>

</body>

</html>