// Função para a troca de slides 
let counter = 1;
        setInterval(function () {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 5000); // Troca de slide a cada 5 segundos