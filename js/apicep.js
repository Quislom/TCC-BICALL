// API CEP para preenchimento automatico no formulario
async function buscarCEP() {
    const cep = document.getElementById('cep').value;
    if (cep.length !== 8 || isNaN(cep)) {
        alert('Por favor, insira um CEP válido.');
        return;
    }

    try {
        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const data = await response.json();
        if (data.erro) {
            alert('CEP não encontrado.');
        } else {
            document.getElementById('endereco').value = data.logradouro;
            document.getElementById('bairro').value = data.bairro;
           
        }
    } catch (error) {
        console.error('Erro ao buscar CEP:', error);
        alert('Erro ao buscar CEP.');
    }
}
