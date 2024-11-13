// API(pública) CEP para preenchimento automatico no formulario
async function buscarCEP() {
    // Obtém o valor do campo de entrada do CEP
    const cep = document.getElementById('cep').value;
    // Verifica se o CEP possui exatamente 8 dígitos e se é um número
    if (cep.length !== 8 || isNaN(cep)) {
        alert('Por favor, insira um CEP válido.');
        return;// Sai da função se o CEP for inválido

    }

    try {
        // Faz uma solicitação à API ViaCEP para buscar o endereço pelo CEP
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();

        // Verifica se houve um erro na resposta (CEP não encontrado)
        if (data.erro) {
            alert('CEP não encontrado.');
        } else {
             // Preenche os campos de endereço e bairro com os dados retornados
            document.getElementById('endereco').value = data.logradouro;
            document.getElementById('bairro').value = data.bairro;
           
        }
    } catch (error) {
         // Exibe uma mensagem de erro no console e alerta o usuário em caso de falha na busca
        console.error('Erro ao buscar CEP:', error);
        alert('Erro ao buscar CEP.');
    }
}













//await: permite que o código espere pela conclusão de uma Promise (promessa) antes de continuar com a execução.