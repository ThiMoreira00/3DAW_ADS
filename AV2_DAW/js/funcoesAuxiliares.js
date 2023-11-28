
// Função de listar candidatos
function listarCandidatos() {

    $.ajax({ 

        type: "POST",
        url: "http://localhost/3DAW_AV2/php/candidato_listar.php",
        success: function(resultado) {
            
            // Transformando o resultado em um array php 
            var candidatos = JSON.parse(resultado);

            var tabela = document.getElementById("candidatos");

            for(var i = 0; i < candidatos.length; i++) {
                
                var linha = tabela.insertRow(-1);
                var celula;
                
                celula = linha.insertCell(0);
                celula.innerText = candidatos[i].nome;

                celula = linha.insertCell(1);
                celula.innerText = candidatos[i].cpf;

                celula = linha.insertCell(2);
                celula.innerText = candidatos[i].identidade;

                celula = linha.insertCell(3);
                celula.innerText = candidatos[i].email;

                celula = linha.insertCell(4);
                celula.innerText = candidatos[i].cargo_pretendido;
                
                celula = linha.insertCell(5);
                celula.innerText = candidatos[i].sala_prova;

                console.log(candidatos[i]);
            }

            

            // var tabela = document.getElementById("tabela");
            // tabela.innerHTML = "";

        }

    });

}



function adicionarCandidato() {

    // Pegar os valores dos inputs
    var nome = document.getElementById("nome").value;
    var cpf = document.getElementById("cpf").value;
    var identidade = document.getElementById("identidade").value;
    var email = document.getElementById("email").value;
    var cargo = document.getElementById("cargo").value;
    var sala = document.getElementById("sala").value;

    if(nome == "" || cpf == "" || identidade == "" || email == "" || cargo == "" || sala == "") {
        alert("Dados incompletos! Preencha novamente.");

    } else {

        $.ajax({ 

            type: "POST",
            url: "http://localhost/3DAW_AV2/php/candidato_adicionar.php",
            data: {
                'nome': nome,
                'cpf': cpf,
                'identidade': identidade,
                'email': email,
                'cargo': cargo,
                'sala': sala
            },
            
            success: function(resultado) {
                alert(resultado);
            }

        });

    }

}

function alterarCandidato() {

    // Pegar os valores dos inputs
    var nome = document.getElementById("nome").value;
    var cpf = document.getElementById("cpf").value;
    var sala = document.getElementById("sala").value;

    if(nome == "" || cpf == "" || sala == "") {
        alert("Dados incompletos! Preencha novamente.");

    } else {

        $.ajax({ 

            type: "POST",
            url: "http://localhost/3DAW_AV2/php/candidato_alterar.php",
            data: {
                'nome': nome,
                'cpf': cpf,
                'sala': sala
            },
            
            success: function(resultado) {
                alert(resultado);
            }

        });

    }

}



function adicionarFiscal() {


    // Pegar os valores dos inputs
    var nome = document.getElementById("nome").value;
    var cpf = document.getElementById("cpf").value;
    var sala = document.getElementById("sala").value;

    if(nome == "" || cpf == "" || sala == "") {
        alert("Dados incompletos! Preencha novamente.");

    } else {

        $.ajax({ 

            type: "POST",
            url: "http://localhost/3DAW_AV2/php/fiscal_adicionar.php",
            data: {
                'nome': nome,
                'cpf': cpf,
                'sala': sala
            },
            
            success: function(resultado) {
                alert(resultado);
            }

        });

    }

    



}


// Função de listar candidatos
function buscarCandidato() {

    var cpf = document.getElementById("cpf").value;

    if(cpf == "") {
        alert("Dados incompletos! Preencha novamente.")
    }
    $.ajax({ 

        type: "POST",
        url: "http://localhost/3DAW_AV2/php/candidato_buscar.php",
        data: {
            'cpf': cpf,
        },
        success: function(resultado) {
            
            if(resultado == "erro") {
                alert("Não foi possível encontrar o candidato.");

            } else {
                window.location.href = "http://localhost/3DAW_AV2/alterarCandidato.php?cpf=" + cpf;
            }
        }

    });

}