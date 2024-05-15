document.addEventListener("DOMContentLoaded", function() {
    // Adiciona um evento de clique aos inputs type="radio" do grupo
    const radioInputs = document.querySelectorAll('input[name="opcao"]');
    radioInputs.forEach(function(radioInput) {
        radioInput.addEventListener("click", function() {
            // Desmarca todos os outros inputs do grupo
            radioInputs.forEach(function(otherRadioInput) {
                if (otherRadioInput !== radioInput) {
                    otherRadioInput.checked = false;
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const radioTodas = document.getElementById("opcaoTodas");
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    radioTodas.addEventListener("click", function() {
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = true;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const radioComum = document.getElementById("perfilComum");
    const checkboxCadastrarChamado = document.querySelector('input[name="cadastrar_chamado"]');

    radioComum.addEventListener("click", function() {
        checkboxCadastrarChamado.checked = true;
    });
});

document.addEventListener("DOMContentLoaded", function() {
    // Adiciona um evento de clique aos inputs type="radio" do grupo
    const radioInputs = document.querySelectorAll('input[name="opcao"]');
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

    radioInputs.forEach(function(radioInput) {
        radioInput.addEventListener("click", function() {
            // Desmarca todos os outros inputs do grupo
            radioInputs.forEach(function(otherRadioInput) {
                if (otherRadioInput !== radioInput) {
                    otherRadioInput.checked = false;
                }
            });

            // Desmarca todos os checkboxes
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });

            // Marca apenas as checks específicas do radio selecionado
            if (radioInput.id === "opcaoTodas") {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = true;
                });
            } else if (radioInput.id === "perfilComum") {
                const checkboxCadastrarChamado = document.querySelector('input[name="cadastrar_chamado"]');
                checkboxCadastrarChamado.checked = true;

            } else if (radioInput.id === "perfilTec") {
                checkboxes.forEach(function(checkbox) {
                    if (
                        checkbox.name === "relatorio_os" ||
                        checkbox.name === "responder_os" ||
                        checkbox.name === "aceitar_recusar_os" ||
                        checkbox.name === "editar_os" ||
                        checkbox.name === "todas_os" ||
                        checkbox.name === "cadastrar_chamado" ||
                        checkbox.name === "vizualizar_chamado" ||
                        checkbox.name === "requisicao_chamado" ||
                        checkbox.name === "relatorio_chamado" ||
                        checkbox.name === "aceitar_recusar_chamado" ||
                        checkbox.name === "editar_chamado" ||
                        checkbox.name === "cadastrar_equipamento" ||
                        checkbox.name === "gerenciar_equipamento"
                    ) {
                        checkbox.checked = true;
                    } else {
                        checkbox.checked = false;
                    }
                });
              

            } else if (radioInput.id === "perfilCli") {
                // Marca apenas as checks específicas do perfil cliente
                checkboxes.forEach(function(checkbox) {
                    if (
                        checkbox.name === "cadastrar_usuario" ||
                        checkbox.name === "cadastrar_perfil" ||
                        checkbox.name === "cadastrar_item" ||
                        checkbox.name === "cadastrar_equipamento" ||
                        checkbox.name === "gerenciar_usuario" ||
                        checkbox.name === "gerenciar_perfil" ||
                        checkbox.name === "gerenciar_equipamento" ||
                        checkbox.name === "vizualizar_chamado" ||
                        checkbox.name === "requisicao_chamado" ||
                        checkbox.name === "cadastrar_chamado" ||
                        checkbox.name === "todas_os" 
                    ) {
                        checkbox.checked = true;
                    } else {
                        checkbox.checked = false;
                    }
                });
            }
            // Adicione mais condições conforme necessário para outros rádios
        });
    });
});


