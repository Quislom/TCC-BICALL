let btn= document.querySelector(".hamburguer");
let div = document.querySelector(".sidebar");
btn.addEventListener("click", ()=>{
  div.classList.toggle("active")
})