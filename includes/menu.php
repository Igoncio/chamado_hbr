<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use App\Entity\Usuario;

// Verificar se o usuário está logado
if (isset($_SESSION['id_user'])) {
    // Aqui você pode buscar as informações do usuário no banco de dados usando o ID da sessão
    $objUsuario = Usuario::getUser($_SESSION['id_user']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="../pages/main_tela_inicial.php"><img id="logo_menu" src="../imgs/logo/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Chamados
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../pages/main_cad_chama.php">Cadastrar chamado</a></li>
                      <li><a class="dropdown-item" href="../pages/main_vizualizar_chamado.php">Vizualizar Chamados</a></li>
                      <li><a class="dropdown-item" href="#">Validar chamados</a></li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Gerenciamento
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../pages/main_ger_cli.php">Gerenciar clientes</a></li>
                  <li><a class="dropdown-item" href="../pages/main_ger_equip.php">Gerenciar equipamentos</a></li>
                  <li><a class="dropdown-item" href="../pages/main_ger_perf.php">Gerenciar perfis</a></li>
                  <li><a class="dropdown-item" href="../pages/main_ger_user.php">Gerenciar usuarios</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cadastros
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../pages/main_cad_cli.php">Cadastrar cliente</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_perf.php">Cadastrar perfis</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_user.php">Cadastrar usuarios</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_item.php">Cadastrar equipamento</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_chama.php">Cadastrar chamado</a></li>
                </ul>
              </li>


              
              
            </ul>

            <ul class="menu-user">
              <div class="container-user">

                <i id="icon-user" class="bi bi-person-fill"></i>
                <h5 id="txt-user"><?php echo $objUsuario->nome;?></h1>

                <div id="dropdown" class="dropdown-content">
                    <a href="../">Sair</a>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </nav>


</body>
</html>