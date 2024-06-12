let btn= document.querySelector(".hamburguer");
let div = document.querySelector(".sidebar");
btn.addEventListener("click", ()=>{
  div.classList.toggle("active")
})


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

  const txtBannerElements = document.querySelectorAll('.txtBanner');
  txtBannerElements.forEach(function(element){
    element.classList.toggle('dark-mode');
  });
});

