<?php

require_once __DIR__ . '/../vendor/autoload.php';



include_once ("../includes/menu.php");
include_once ("../includes/php/vizualizar_os.php");
// include_once("../includes/php/excluir_user.php");
?>

<link rel="stylesheet" href="../assets/css/vizualizar_chama2.css">
<link rel="stylesheet" href="../assets/css/imprimir.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>vizualizar os</title>

<body>


  <h1 id="titulo_page">Vizualizar Ordem de serviço</h1>
  <section class="area-main">

    <?= $user_lista ?>

    <a class="link-btn" href="../pages/main_tela_inicial.php">
      <button  type="button" id="voltar-btn" class="btn btn-outline-primary">Voltar</button>
    </a>
  </section>


  <h1 class="titulo-imprimir">Ordem de Serviço <?php echo $dadosID->id_chamado;?></h1>
  <section class="area-imprimir">
    
    
    <div class="area-txt-imprimir">
      <span class="txt-imprimir">Requisitante: <?php echo $dadosID->nome_solicitante;?><br>
      Abertura: <?php echo $dadosID->abertura;?><br><br>
      Responsável: <?php echo $dadosID->nome_resp;?><br>
      Cliente: <?php echo $dadosID->nome_cliente;?><br><br>
      Equipamento(s): <?php echo $dadosID->nome_equip;?><br>
      Tipo: <?php echo $dadosID->tipo;?><br>
      Prioridade: <?php echo $dadosID->prioridade;?><br><br>
      Descrição: <?php echo $dadosID->descricao;?><br><br>
      Resposta Técnica: <?php echo $dadosID->resposta;?><br><br>
      Imagem :<br>
      <img class="imagem" src="../imgs/chamado/<?php echo ($dadosID->imagem); ?>" alt="Imagem do Chamado">   

      </span>
    </div>



  </section>


</body>

</html>