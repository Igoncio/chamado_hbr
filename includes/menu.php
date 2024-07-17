<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use App\Entity\Usuario;
use App\Entity\Notificacao;

$objnot = Notificacao::getNot();



$not_lista = '';
$tem_notificacao = false; // Variável para verificar se há notificações

foreach ($objnot as $notificacao) {
  $id_execultou = isset($notificacao['id_execultou']) ? $notificacao['id_execultou'] : null;
  $solicitante = isset($notificacao['id_solicitante']) ? $notificacao['id_solicitante'] : null;
  $responsavel = isset($notificacao['id_responsavel']) ? $notificacao['id_responsavel'] : null;
  $visto = isset($notificacao['visto']) ? $notificacao['visto'] : null;

  if (
    ($id_execultou == $_SESSION['id_user'] ||
     $solicitante == $_SESSION['id_user'] ||
     $responsavel == $_SESSION['id_user'])
  ) {
    $chama_id = isset($notificacao['id_chama']) ? $notificacao['id_chama'] : '';
    $icon_class = $visto == 1 ? 'bi-eye-slash-fill' : 'bi-eye-fill';
    $not_lista .= '
    <div class="content-not">
        <a href="../pages/main_vizualizar_os.php?id_chamado=' . $chama_id . '" id="link-not">
            <h1 id="txt-not">' . $notificacao['notificacao'] . '             <a id="link2-not" href="../includes/php/vizualizar_not.php?id_not=' . $notificacao['id_not'] . '">
            <button id="btn-not" type="button"><i class="bi ' . $icon_class . '"></i></button>
            </a></h1>

      </a>
    </div>';
$tem_notificacao = true;

  }
}

if (!$tem_notificacao) {
  $not_lista .= '<p>Não existem notificações criadas</p>';
}

// Exibir a lista de notificações
// echo $not_lista;

// Interrompe o script para ver os resultados até este ponto

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
  // Aqui você pode buscar as informações do usuário no banco de dados usando o ID da sessão
  $objUsuario = Usuario::getUser($_SESSION['id_user']);
}

use App\Entity\Perfil;

$dados = $objUsuario->getPermissao($_SESSION['id_user']);

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
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="php/menu_config.php">
</head>

<body>

<nav class="navbar  navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="../pages/main_tela_inicial.php"><img id="logo_menu" src="../imgs/logo/logo.png"
        alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros
          </a>
          <ul class="dropdown-menu">
            <?php echo $cad_cli ?'<li><a class="dropdown-item" href="../pages/main_cad_cli.php">Cadastrar cliente</a></li>' : ''?>
            <?php echo $cad_perf ? '<li><a class="dropdown-item" href="../pages/main_cad_perf.php">Cadastrar perfis</a></li>' : ''?>
            <?php echo $cad_user ? '<li><a class="dropdown-item" href="../pages/main_cad_user.php">Cadastrar usuarios</a></li>' : ''?>
            <?php echo $cad_equip ?'<li><a class="dropdown-item" href="../pages/main_cad_item.php">Cadastrar equipamento</a></li>' : ''?>
            <li><a class="dropdown-item" href="../pages/main_cad_chama.php">Cadastrar chamado</a></li>
            </ul>
            </li>
            

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Chamados
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../pages/main_cad_chama.php">Cadastrar Chamado</a></li>
            <?php echo $vizu_chama ?'<li><a class="dropdown-item" href="../pages/main_vizualizar_chamado.php">Todos Chamados</a></li>' : ''?>
            <li><a class="dropdown-item" href="../pages/main_seus_chamado.php">Seus Chamados</a></li>
            <?php echo $req_chama ?'<li><a class="dropdown-item" href="../pages/main_requisicao_chamado.php">Requisições de Chamados</a></li>' : ''?>
            <?php echo $relatorio_chama ?'<li><a class="dropdown-item" href="#">Relatorio de Chamados</a></li>' : ''?>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ordens de Serviço
          </a>
          <ul class="dropdown-menu">
            <?php echo $todas_os ?'<li><a class="dropdown-item" href="../pages/main_todas_os.php">Todas Os</a></li>' : ''?>
            <li><a class="dropdown-item" href="../pages/main_suas_os.php">Suas Os</a></li>
            <?php echo $resp_os ?'<li><a class="dropdown-item" href="../pages/main_os_naorespondida.php">Os não respondidas</a></li>' : ''?>
            <?php echo $resp_os ?' <li><a class="dropdown-item" href="../pages/main_os_respondida.php">Os respondidas</a></li>' : ''?>
            <?php echo $resp_os ?'  <li><a class="dropdown-item" href="../pages/main_os_finalizada.php">Os finalizadas</a></li>' : ''?>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gerenciamento
          </a>
          <ul class="dropdown-menu">
            <?php echo $ger_user ?'<li><a class="dropdown-item" href="../pages/main_ger_user.php">Gerenciar usuarios</a></li>' : ''?>
            <?php echo $ger_perf ?'<li><a class="dropdown-item" href="../pages/main_ger_perf.php">Gerenciar perfis</a></li>' : ''?>
            <?php echo $ger_equip ?'<li><a class="dropdown-item" href="../pages/main_ger_equip.php">Gerenciar equipamentos</a></li>' : ''?>
            <?php echo $ger_cli ?'<li><a class="dropdown-item" href="../pages/main_ger_cli.php">Gerenciar clientes</a></li>' : ''?>
          </ul>
        </li>
      </ul>

      <ul class="menu-user">
        <i id="icon-not" class="bi bi-bell-fill"></i>
        
        <div id="notificationModal" class="modal">
          <div class="modal-content">
            <button class="close">&times;</button> 
            <h2>Notificações</h2>
            <div class="area-not">
                  <?php echo $not_lista; ?>
            </div>
          </div>
        </div>

        <div class="container-user">

          <i id="icon-user" class="bi bi-person-fill"></i>
          <h5 id="txt-user"><?php echo $objUsuario->nome; ?></h1>

            <div id="dropdown" class="dropdown-content">
              <a href="../">Sair</a>
            </div>
        </div>
      </ul>
    </div>
  </div>
</nav>

<script src="../assets/js/menu.js"></script>
</body>

</html>