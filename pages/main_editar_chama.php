<?php
require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/php/editar_chama.php");
include_once ("../includes/menu.php");
// include_once("../includes/php/excluir_user.php");
?>


<link rel="stylesheet" href="../assets/css/editar_chama.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>editar chamado</title>

<body>
    <section class="area-main">

        <form class="area-form" method="POST" action="" enctype="multipart/form-data">

            <h1 id="titulo_page">Chamado <?php print_r($objchamado->id_chamado); ?></h1>

            <div class="juntar-input">

                <div class="data-field">
                    <input value="<?php echo $objchamado->abertura; ?>" class="input" type="datetime-local"
                        name="abertura" />
                    <label>Selecione a data e hora de abertura</label>
                </div>

                <div class="data-field">
                    <input value="<?php echo $objchamado->fechamento; ?>" class="input" type="datetime-local"
                        name="fechamento" />
                    <label>Selecione a data e hora de parada</label>
                </div>

            </div>


            <div class="select-field">

                <div>
                    <select id="tamanho-select-duo" class="select" name="id_user">
                        <option value="<?php echo $users[$objchamado->id_user - 32]->id_user; ?>">
                            <?php echo $users[$objchamado->id_user - 32]->nome; ?></option>
                        <?= $options_user ?>
                    </select>
                </div>

                <select id="tamanho-select-duo" class="select" name="id_cli">
                    <option value="<?php echo $clientes[$objchamado->id_cli - 1]->id_cli; ?>">
                        <?php echo $clientes[$objchamado->id_cli - 1]->nome; ?>
                    </option>
                    <?= $options ?>
                </select>
            </div>

            <div class="area-item">
                <select id="item" class="select" name="id_item">
                    <option value="<?php echo $itens[$objchamado->id_item - 17]->id_item; ?>">
                        <?php echo $itens[$objchamado->id_item - 17]->nome;
                        ; ?>
                    </option>
                    <?= $options_item ?>
                </select>
                <i id="mais-item" class="bi bi-plus-circle"></i>
                <i id="menos-item" class="bi bi-dash-circle"></i>
            </div>

            <select id="item" class="select" name="tipo">
                <option value="<?php $objchamado->tipo ?>"><?php print_r($objchamado->tipo); ?></option>
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
                    <input value="<?php print_r($objchamado->num_patrimonio); ?>" class="input" type="text"
                        name="num_patrimonio" />
                    <label class="label" for="input">n° de patrimonio</label>
                </div>

                <div class="input-field">
                    <input value="<?php print_r($objchamado->num_serie); ?>" <?php print_r($objchamado->num_serie); ?>
                        class="input" type="text" name="num_serie" />
                    <label class="label" for="input">n° de série</label>
                </div>
            </div>


            <div class="input-field">
                <textarea id="desc" class="input" name="descricao" maxlength="250">
                <?php print_r($objchamado->descricao); ?>
                </textarea>
                <label class="label" for="desc">Descrição (limite: 250 caracteres)</label>
                <div id="contador-caracteres">0/250 caracteres</div>
            </div>

            <div class="juntar-check">

                <h1 id="txt-perm">Prioridade:</h1>
                <div class="area-prioridade">
                    <label>
                        BAIXA
                        <input id="ant" name="prioridade" type="radio" value="baixa" <?php echo ($objchamado->prioridade == 'baixa') ? 'checked' : '' ?> required />
                    </label>
                </div>

                <div class="area-prioridade">
                    <label>
                        MEDIA
                        <input id="grade" name="prioridade" type="radio" value="media" <?php echo ($objchamado->prioridade == 'media') ? 'checked' : '' ?> required />
                    </label>
                </div>

                <div class="area-prioridade">
                    <label>
                        ALTA
                        <input id="novo" name="prioridade" type="radio" value="alta" <?php echo ($objchamado->prioridade == 'alta') ? 'checked' : '' ?> required />
                    </label>
                </div>
            </div>

            <h1 id="txt-perm">Selecione um anexo (opicional):</h1>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="imagem" accept="image/*">
            </div>


            <div class="btn-field">
                <button class="btn-submit" type="submit" onclick="submitForm(event)">Editar</button>
                <a href="" class="btn-cancelar" id="cancelar" onclick="cancelar(event)">Cancelar</a href="">
            </div>
        </form>
    </section>


</body>

</html>