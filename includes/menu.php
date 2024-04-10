<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/menu.css">
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
                      <li><a class="dropdown-item" href="#">Cadastrar chamado</a></li>
                      <li><a class="dropdown-item" href="#">Vizualizar Chamados</a></li>
                      <li><a class="dropdown-item" href="#">Validar chamados</a></li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Administrativo
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Relátorio de chamados</a></li>
                  <li><a class="dropdown-item" href="#">Gerenciar usuarios</a></li>
                  <li><a class="dropdown-item" href="#">Gerenciar perfis</a></li>
                  <li><a class="dropdown-item" href="#">Gerenciar itens</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cadastros
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../pages/main_cad_user.php">Cadastrar usuarios</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_perf.php">Cadastrar perfis</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_item.php">Cadastrar itens</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_cli.php">Cadastrar cliente</a></li>
                  <li><a class="dropdown-item" href="../pages/main_cad_local.php">Cadastrar Setor</a></li>
                </ul>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Itens
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Arco Cirugico</a></li>
                  <li><a class="dropdown-item" href="#">Ar Condicionado</a></li>
                  <li><a class="dropdown-item" href="#">Computador</a></li>
                  <li><a class="dropdown-item" href="#">Impressora</a></li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>


</body>
</html>