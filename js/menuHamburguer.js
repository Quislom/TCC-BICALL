// Seleciona o botão de menu (hambúrguer) e a sidebar
let btn = document.querySelector(".hamburguer");
let sidebar = document.querySelector(".sidebar");
let banner = document.querySelector(".banner");

// Adiciona uma ação ao clicar no botão de menu
btn.addEventListener("click", () => {
  // Alterna a classe 'active' na sidebar para mostrar ou ocultar
  sidebar.classList.toggle("active");

  // Alterna a classe 'logo-reduzida' no banner para ajustar o tamanho do logo
  banner.classList.toggle("logo-reduzida");
});

// Script para modo escuro
document.getElementById('toggle-dark-mode').addEventListener('click', function(){ 
  // Alterna a classe 'dark-mode' no corpo da página para ativar o modo escuro
  document.body.classList.toggle('dark-mode');

  // Alterna o modo escuro em vários elementos da página, caso existam
  const blocoAmareloLinks = document.querySelector('.blocoAmareloLinks');
  if (blocoAmareloLinks){
    blocoAmareloLinks.classList.toggle('dark-mode');
  }

  const fundo = document.querySelector('.fundo'); 
  if (fundo){
    fundo.classList.toggle('dark-mode');
  }

  const blocoAzulCima = document.querySelector('.blocoAzulCima'); 
  if (blocoAzulCima){
    blocoAzulCima.classList.toggle('dark-mode');
  }

  const blocoAzulMeio = document.querySelector('.blocoAzulMeio'); 
  if (blocoAzulMeio){
    blocoAzulMeio.classList.toggle('dark-mode');
  }

  const titulo2 = document.querySelector('.titulo2'); 
  if (titulo2){
    titulo2.classList.toggle('dark-mode');
  }

  const blocoAmareloRodape = document.querySelector('.blocoAmareloRodape');
  if (blocoAmareloRodape){
    blocoAmareloRodape.classList.toggle('dark-mode');
  }

  const blocoAzulRodape = document.querySelector('.blocoAzulRodape');
  if (blocoAzulRodape){
    blocoAzulRodape.classList.toggle('dark-mode');
  }
 
  // Aplica o modo escuro em todos os elementos com a classe 'txtBanner'
  const txtBannerElements = document.querySelectorAll('.txtBanner');
  txtBannerElements.forEach(function(element){
    element.classList.toggle('dark-mode');
  });
});
