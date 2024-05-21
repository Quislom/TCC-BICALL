let btn= document.querySelector(".hamburguer_exit");
let div = document.querySelector(".sidebar");
btn.addEventListener("click", ()=>{
  div.classList.toggle("disable")
})