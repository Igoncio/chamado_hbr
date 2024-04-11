const cep = document.querySelector('#cep');
const rua = document.querySelector('#rua');
const cidade = document.querySelector('#cidade');
const bairro = document.querySelector('#bairro');
const estado = document.querySelector('#estado');
const message = document.querySelector('#message');

cep.addEventListener('focusout', async () => {
    try {
        const onlyNumbers = /^[0-9]+$/;
        const cepValid = /^[0-9]{8}$/;

        if (!onlyNumbers.test(cep.value) || !cepValid.test(cep.value)) {
            throw { error_cep: 'CEP inválido' };
        }
        
        // Substitua a URL abaixo pela URL da sua API de consulta de CEP
        const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);
        const data = await response.json();

        if (response.ok) {
            rua.value = data.logradouro;
            cidade.value = data.localidade;
            bairro.value = data.bairro;
            estado.value = data.uf;
        } else {
            throw { error_cep: 'Erro ao consultar o CEP' };
        }
    } catch (error) {
        if (error?.error_cep) {
            message.textContent = error.error_cep;

            setTimeout(() => {
                message.textContent = '';
            }, 50000);
        }
        console.log(error);
    }
});
