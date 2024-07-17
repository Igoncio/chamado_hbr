<?php

require_once __DIR__ . '/../vendor/autoload.php';

include_once ("../includes/menu.php");
include_once ("../includes/php/suas_os.php");
// include_once("../includes/php/excluir_user.php");
?>

<link rel="stylesheet" href="../assets/css/requisicao_chama.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="../assets/js/requisicao_chamado.js" defer></script>
<script src="../assets/js/seus_chamados.js" defer></script>
<title>suas os</title>

<body>

    <h1 id="titulo_page">Seus Ordens de Serviço</h1>

    <select name="" id="select-filtro">
        <option value="">Selecione uma opção</option>
        <option value="Aguardando Resposta">Aguardando Resposta</option>
        <option value="Os respondida">Os respondida</option>
        <option value="Os Finalizada">Os Finalizada</option>
    </select>

    <button id="btn-alternador" onclick="toggleView()">Alternar Visualização</button>

    <div id="tableView" style="display: none; height: 450px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Chamado</th>
                    <th scope="col">Requisitante</th>
                    <th scope="col">Abertura</th>
                    <th scope="col">Equipamento(s)</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?= $user_table ?>
            </tbody>
        </table>
    </div>

    <div id="cardView">
        <section class="area-main">
            <!-- Conteúdo em formato de cartão -->
            <?= $user_lista ?>
        </section>
    </div>

    <a class="link-btn" href="../pages/main_tela_inicial.php">
      <button type="button" id="voltar-btn" class="btn btn-outline-primary">Voltar</button>
    </a>

    <script>

        // Filtragem de elementos com base na seleção do filtro
        document.getElementById('select-filtro').addEventListener('change', function() {
            var filter = this.value.toLowerCase();
            filterElements(filter);
        });

        function filterElements(filter) {
            var tableRows = document.querySelectorAll('#tableView tbody tr');
            var cardItems = document.querySelectorAll('#cardView .area-main > *');

            // Função para verificar se um elemento contém o texto correspondente ao filtro
            function containsText(element, filter) {
                return element.textContent.toLowerCase().includes(filter);
            }

            // Função para exibir ou ocultar elementos com base no filtro
            function toggleVisibility(elements, filter) {
                elements.forEach(function(element) {
                    if (filter === '') {
                        element.style.display = '';
                    } else {
                        if (containsText(element, filter)) {
                            element.style.display = '';
                        } else {
                            element.style.display = 'none';
                        }
                    }
                });
            }

            // Aplicar o filtro aos elementos da tabela e dos cartões
            toggleVisibility(tableRows, filter);
            toggleVisibility(cardItems, filter);
        }
    </script>

</body>

</html>
