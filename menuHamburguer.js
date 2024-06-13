let btn= document.querySelector(".hamburguer");
let div = document.querySelector(".sidebar");
btn.addEventListener("click", ()=>{
  div.classList.toggle("active")
})



//Script dark-mode
document.getElementById('toggle-dark-mode').addEventListener('click', function(){ 
  document.body.classList.toggle('dark-mode');

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

  const  blocoAzulRodape = document.querySelector('.blocoAzulRodape');
  if ( blocoAzulRodape){
    blocoAzulRodape.classList.toggle('dark-mode');
  }
 
  const txtBannerElements = document.querySelectorAll('.txtBanner');
  txtBannerElements.forEach(function(element){
    element.classList.toggle('dark-mode');
  });
});
