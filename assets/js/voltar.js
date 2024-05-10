function submitForm(event) {
  // Impede o envio padrão do formulário
  event.preventDefault();

  // Aqui você pode adicionar o código para enviar os dados do formulário
  
  // Retorna para a última página
  window.history.back();
}


function cancelar(event) {
    // Impede o envio padrão do formulário
    event.preventDefault();
  
    // Aqui você pode adicionar o código para enviar os dados do formulário
    
    // Retorna para a última página
    window.history.back();
  }