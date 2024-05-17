<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/cad_chama.php");

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
// print_r($clienteSelecionado);
?>


<link rel="stylesheet" href="../assets/css/cad_chama.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js">
<script src="../assets/js/cad_chama.js" defer></script>
<script src="js/jquery.min.js"></script>

<title>cadastrar chamado</title>

<body>

    <section class="area-main">

        <form class="area-form" method="POST" action="" enctype="multipart/form-data">

            <h1 id="titulo_page">Cadastrar Chamado</h1>

            <div class="juntar-input">

            <div class="data-field">
                <?php if ($edit_chama) : ?>
                    <input class="input" type="datetime-local" name="abertura" onfocus="automatizarDataHora(this)" />
                <?php else : ?>
                    <input class="input" type="datetime-local" name="abertura" value="<?php echo date('Y-m-d\TH:i'); ?>" disabled />
                <?php endif; ?>
                <label>Selecione a data e hora de abertura</label>
            </div>

                <div class="data-field">
                    <input class="input" type="datetime-local" name="fechamento" />
                    <label>Selecione a data e hora de parada</label>
                </div>

            </div>


            <div class="select-field">

                <div>
                    <select id="tamanho-select-duo" class="select" name="id_user">
                        <option value="0">Selecione o responsável</option>
                        <?= $options_user ?>
                    </select>
                </div>

                <select id="cliente-select" class="select" name="id_cli">
                    <option value="0">Selecione o Cliente</option>
                    <?= $options ?>
                </select>

                <select id="item-select" class="select" name="id_item">
                 
                </select>

            <select id="item" class="select" name="tipo">
                <option value="0">Selecione o tipo</option>
                <option value="preventivo">Preventivo</option>
                <option value="corretivo">corretivo</option>
                <option value="configuracao">configuração</option>
                <option value="instalacao">instalação</option>
                <option value="retirada">retirada</option>
                <option value="recebimento">recebimento</option>
                <option value="treinamento">treinamento</option>
                <option value="seguraca_eletrica">seguraça elétrica</option>
            </select>

            <div class="juntar-input">

                <div class="input-field">
                    <input class="input" type="text" name="num_patrimonio" placeholder="n° de patrimonio" />
                </div>

                <div class="input-field">
                    <input class="input" type="text" name="num_serie" placeholder="n° de serie" />
                </div>
            </div>


            <div class="input-field">
                <textarea id="desc" class="input" name="descricao" maxlength="250"></textarea>
                <label class="label" for="desc">Descrição (limite: 250 caracteres)</label>
                <div id="contador-caracteres">0/250 caracteres</div>
            </div>

            <div class="juntar-check">

                <h1 id="txt-perm">Prioridade:</h1>
                <div class="area-prioridade">
                    <label>
                        BAIXA
                        <input id="ant" name="prioridade" type="radio" value="baixa" required />
                    </label>
                </div>

                <div class="area-prioridade">
                    <label>
                        MEDIA
                        <input id="grade" name="prioridade" type="radio" value="media" required />
                    </label>
                </div>

                <div class="area-prioridade">
                    <label>
                        ALTA
                        <input id="novo" name="prioridade" type="radio" value="alta" required />
                    </label>
                </div>



                <h1 id="txt-perm">Selecione um anexo (opicional):</h1>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="imagem" accept="image/*">
                </div>





                <div class="btn-field">

                    <button class="btn-submit" type="submit">Cadastrar</button>
                    <a href="" class="btn-cancelar" id="cancelar">Cancelar</a href="">

                </div>


        </form>


    </section>

    <script>
        $(document).ready(function(){
            $('#cliente-select').on('change', function(){
                var id_cli = $(this).val();
                if(id_cli){
                    $.ajax({
                        type:'POST',
                        url:'../includes/php/filtrar_item.php',
                        data:'id_cliente='+id_cli,
                        success:function(html){
                           $('#item-select').html(html);

                        }
                    });
                }
                else{
                    $('#item_select').html('<option value="">Selecione o Item</option>');

                }
            });
        });


    </script>

</body>

</html>