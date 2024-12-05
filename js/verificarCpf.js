
    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

        if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
            return false; // Verifica se o CPF tem 11 dígitos e não é repetido
        }

        let soma = 0, resto;

        // Validação do primeiro dígito
        for (let i = 1; i <= 9; i++) {
            soma += parseInt(cpf.charAt(i - 1)) * (11 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(9))) return false;

        soma = 0;

        // Validação do segundo dígito
        for (let i = 1; i <= 10; i++) {
            soma += parseInt(cpf.charAt(i - 1)) * (12 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(10))) return false;

        return true;
    }

    function validarFormulario() {
        const cpf = document.forms['formAluno']['cpf'].value;

        if (!validarCPF(cpf)) {
            alert('CPF inválido. Por favor, digite um CPF válido.');
            return false; // Impede o envio do formulário
        }

        return true; // Continua com o envio do formulário se o CPF for válido
    }


    //Mensagem de erro caso já tenha o cpf ou o nome na tabela


    const form = document.querySelector("form[name='formAluno']");
    const errorMessageDiv = document.getElementById("error-message");

    form.addEventListener("submit", async function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const formData = new FormData(form); // Coleta os dados do formulário
        const response = await fetch(form.action, {
            method: "POST",
            body: formData,
        });

        const result = await response.json(); // Assume que o servidor retorna JSON

        if (result.success) {
            alert("Cadastro realizado com sucesso!");
            form.reset(); // Limpa o formulário
        } else {
            errorMessageDiv.textContent = result.message; // Exibe a mensagem de erro
            errorMessageDiv.style.display = "block";
        }
    });

