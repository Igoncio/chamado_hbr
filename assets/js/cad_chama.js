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