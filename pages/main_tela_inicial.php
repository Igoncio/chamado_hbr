<?php

include_once ("../includes/menu.php");

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/php/tela_inicial.php");

use App\Entity\Usuario;
use App\Entity\Perfil;

// $dados = $objUsuario->getUser($_SESSION['id_user']);


// print_r($dados);
// print_r($perfil);
// exit;


?>
<link rel="stylesheet" href="../assets/css/tela_inicial.css">
<title>tela inicial</title>

<body>

    <h1 id="titulo_page">Tela Inicial</h1>
    <section class="area-main">

        <section class="area-cad">

            <h1 id="txt-area">Cadastros</h1>


            <a href="main_cad_cli.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar Cliente</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um cliente</div>
                </div>
            </a>


            <a href="main_cad_perf.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar Perfil</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um perfil</div>
                </div>
            </a>

            <a href="main_cad_user.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar Usuário</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um usuario</div>
                </div>
            </a>

            <a href="main_cad_item.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar equipamento</div>
                    <div class="notibody1">Selecione esta opção para cadastrar qualquer equipamento(ex: lenovo ideapad,
                        monitor dell 24 pol, etc...)</div>
                </div>
            </a>

            <a href="main_cad_chama.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar Chamado</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um chamado</div>
                </div>
            </a>

        </section>


        <section class="area-chamado">

            <h1 id="txt-area">Chamados</h1>
            <a href="main_vizualizar_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Vizualizar chamado</div>
                    <div class="notibody1">Selecione esta opção para vizualizar os chamados criados por todos usuarios
                    </div>
                </div>
            </a>

            <a href="main_seus_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Seus Chamados</div>
                    <div class="notibody1">Selecione esta opção para ver as atualizações de chamados criados por você
                    </div>
                </div>
            </a>

            <a href="main_requisicao_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Requisições de Chamados</div>
                    <div class="notibody1">Selecione esta opção para validar os chamados já criados</div>
                </div>
            </a>

            <a href="#">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Relatório de chamados</div>
                    <div class="notibody1">Selecione esta opção para vizualizar o relatório dos chamados</div>
                </div>
            </a>

            <a href="#">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Cadastrar chamado</div>
                    <div class="notibody1">Selecione esta opção para cadastrar um chamado</div>
                </div>
            </a>

        </section>

        <section class="area-chamado">

            <h1 id="txt-area">Ordens de Serviço</h1>
            <a href="main_todas_os.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Todas Os</div>
                    <div class="notibody1">Selecione esta opção para vizualizar e responder a todas ordens de seviço
                    </div>
                </div>
            </a>

            <a href="main_suas_os.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Suas Os</div>
                    <div class="notibody1">Selecione esta opção para responder as ordens de serviço encaminhadas a você
                    </div>
                </div>
            </a>

            <a href="main_os_naorespondida.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Os não respondidas</div>
                    <div class="notibody1">Selecione esta opção para vizualizar e responder a todas ordens de seviço
                    </div>
                </div>
            </a>


            <a href="main_os_respondida.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Os respondidas</div>
                    <div class="notibody1">Selecione esta opção para vizualizar e responder a todas ordens de seviço
                    </div>
                </div>
            </a>


        </section>



        <section class="area-gerenciar">

            <h1 id="txt-area">Gerenciamento</h1>
            <a href="main_ger_user.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar usuário</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer usuário</div>
                </div>
            </a>

            <a href="main_ger_perf.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar perfil</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer perfil</div>
                </div>
            </a>


            <a href="main_ger_equip.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar equipamento</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer equipamento</div>
                </div>
            </a>

            <a href="main_ger_cli.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Gerenciar Cliente</div>
                    <div class="notibody1">Selecione esta opção para gerenciar qualquer Cliente</div>
                </div>
            </a>

        </section>

    </section>

</body>

</html>