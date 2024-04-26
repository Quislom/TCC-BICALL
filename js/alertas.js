function validarFormulario() {
    var nomeAluno = document.forms["formAluno"]["cxnomealuno"].value;
    var serie = document.forms["formAluno"]["serie"].value;
    var curso = document.forms["formAluno"]["curso"].value;
  
    if (nomeAluno == "" || serie == "" || curso == "") {
      alert("Por favor, preencha todos os campos!");
      return false;
    }
  }
  
  
    alert("Olá, não esqueça de preencher os campos e selecionar as opções!!")
    alert("É serio, nao esqueça!!")
  