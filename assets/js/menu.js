// Abrir o modal quando clicar no ícone de sino
document.getElementById('icon-not').addEventListener('click', function() {
    document.getElementById('notificationModal').style.display = 'block';
  });
  

    document.addEventListener("DOMContentLoaded", function() {
        // Captura o botão de fechar
        var closeButton = document.querySelector(".close");

        // Adiciona um evento de clique ao botão de fechar
        closeButton.addEventListener("click", function() {
            // Encontra o modal e fecha
            var modal = document.querySelector(".modal");
            modal.style.display = "none";
        });
    });

