
//alerta para o cadastro de gestores academicos

//Função para obter os valores dos campos (nome,email,senha)
function validarFormulario() {
    var nome = document.forms["formProf"]["nome"].value;
    var email = document.forms["formProf"]["email"].value;
    var senha = document.forms["formProf"]["senha"].value;

    
  
    if (nome == "" || email == "" || senha == "") //Verifica se algum dos campos esta vazio
      {
     // Se algum campo está vazio, exibe um alerta pedindo para preencher todos os campos

      alert("Por favor, preencha todos os campos!");
      return false;

    }
        // Se todos os campos estão preenchidos, exibe um alerta informando isso
    else {
      alert(" Dados cadastrados com sucesso! ");
    }
  }
  
  
