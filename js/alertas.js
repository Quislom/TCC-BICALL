
//alerta para o cadastro de gestores academicos
function validarFormulario() {
    var nome = document.forms["formProf"]["nome"].value;
    var email = document.forms["formProf"]["email"].value;
    var senha = document.forms["formProf"]["senha"].value;
  
    if (nome == "" || email == "" || senha == "") {
      alert("Por favor, preencha todos os campos!");
      return false;

    }

    else {
      alert(" Dados cadastrados com sucesso! ");
    }
  }
  
  
