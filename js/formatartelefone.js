function formatarTelefone(campo) {
    // Remove todos os caracteres que não são dígitos
    let valor = campo.value.replace(/\D/g, '');

    // Formata o valor conforme o usuário digita
    if (valor.length >= 3 && valor.length <= 6) {
        campo.value = `(${valor.slice(0, 2)}) ${valor.slice(2)}`;
    } else if (valor.length > 6) {
        campo.value = `(${valor.slice(0, 2)}) ${valor.slice(2, 7)}-${valor.slice(7, 11)}`;
    } else {
        campo.value = valor;
    }
}
