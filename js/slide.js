// Define o contador inicial para o slide
let counter = 1;
// Configura um intervalo para trocar de slide automaticamente a cada 5 segundos (5000 milissegundos)
setInterval(function () {
    // Seleciona o slide atual baseado no valor do contador, marcando o respectivo radio button
    document.getElementById('radio' + counter).checked = true;
    // Incrementa o contador para o próximo slide
    counter++;
    // Reinicia o contador se ultrapassar o número total de slides (neste caso, 4 slides)
    if (counter > 4) {
        counter = 1;
    }
}, 5000); // Troca de slide a cada 5 segundos
