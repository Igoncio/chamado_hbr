const inputAbertura = document.querySelector('input[name="abertura"]');

// Obter a data e hora atual
const agora = new Date();
const ano = agora.getFullYear();
const mes = String(agora.getMonth() + 1).padStart(2, '0'); // Adicionar zero à esquerda se necessário
const dia = String(agora.getDate()).padStart(2, '0'); // Adicionar zero à esquerda se necessário
const hora = String(agora.getHours()).padStart(2, '0'); // Adicionar zero à esquerda se necessário
const minuto = String(agora.getMinutes()).padStart(2, '0'); // Adicionar zero à esquerda se necessário

// Formatar a data e hora para o formato do input datetime-local
const dataHoraFormatada = `${ano}-${mes}-${dia}T${hora}:${minuto}`;

// Definir o valor no input de data e hora de abertura
inputAbertura.value = dataHoraFormatada;

var maxSelects = 5;

        document.getElementById('mais-item').addEventListener('click', function() {
            // Obtém todos os elementos <select> dentro da div 'area-item'
            var selects = document.querySelectorAll('.area-item select');
            // Verifica se o limite foi atingido
            if (selects.length >= maxSelects) {
                alert('Limite máximo de ' + maxSelects + ' campos atingido.');
                return;
            }

            // Cria um novo elemento <select>
            var novoSelect = document.createElement('select');
            novoSelect.className = 'select';
            novoSelect.name = 'id_item';

            // Adiciona a opção padrão
            var opcaoPadrao = document.createElement('option');
            opcaoPadrao.value = '0';
            opcaoPadrao.textContent = 'Selecione o item';
            novoSelect.appendChild(opcaoPadrao);

            // Adiciona o novo <select> à div 'area-item'
            var areaItem = document.querySelector('.area-item');
            areaItem.insertBefore(novoSelect, document.getElementById('mais-item'));
        });

        document.getElementById('menos-item').addEventListener('click', function() {
            // Obtém todos os elementos <select> dentro da div 'area-item'
            var selects = document.querySelectorAll('.area-item select');
            // Verifica se há mais de um elemento para não remover o último
            if (selects.length > 1) {
                // Remove o último elemento <select>
                selects[selects.length - 1].remove();
            }
        });

