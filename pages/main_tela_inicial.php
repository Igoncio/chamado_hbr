<?php

include_once("../includes/menu.php");

require_once __DIR__ . '/../vendor/autoload.php';

use App\Entity\Usuario;

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Aqui você pode buscar as informações do usuário no banco de dados usando o ID da sessão
    $objUsuario = Usuario::getUser($_SESSION['id_user']);

    // Verificar se o objeto de usuário foi obtido com sucesso
    if ($objUsuario) {
        // Exibir o nome do usuário na tela
        echo "Bem-vindo, " . $objUsuario->nome;
    } else {
        // Não foi possível obter informações do usuário, faça o tratamento adequado
        echo "Erro ao obter informações do usuário.";
    }
} else {
    // Caso não esteja logado, redirecione para a página de login
    header("Location: ../../index.php");
    exit;
}


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
                    <div class="notibody1">Selecione esta opção para cadastrar qualquer equipamento(ex: lenovo ideapad, monitor dell 24 pol, etc...)</div>
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
                    <div class="notibody1">Selecione esta opção para vizualizar os chamados criados por todos usuarios</div>
                </div>
            </a>
    
    
            <a href="main_validar_chamado.php">
                <div class="card1">
                    <div class="notiglow1"></div>
                    <div class="notiborderglow1"></div>
                    <div class="notititle1">Validar chamado</div>
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