<?php 

include_once '../conn.php';

// Verificando se existe alguém com o mesmo CPF / email
$query = $conn->prepare("SELECT cpf, email FROM candidatos WHERE cpf = ? OR email = ?");
$query->execute([ $_POST['cpf'], $_POST['email'] ]);

// Se tiver alguma entrada...
if($query->rowCount() > 0) {

    // ... notificar que não é possível adicionar.
    echo "Não foi possível adicionar o candidato. Já existe um candidato com o mesmo CPF!";
    exit;

} else {

    // Resetando a query
    $query = NULL;

    // Verificando se existe algum fiscal com o mesmo CPF
    $query = $conn->prepare("SELECT cpf FROM fiscais WHERE cpf = ?");
    $query->execute([ $_POST['cpf'] ]);

    // Se tiver alguma entrada...
    if($query->rowCount() > 0) {

        // ... notificar que não é possível adicionar.
        echo "Não foi possível adicionar o candidato. Já existe um fiscal com o mesmo CPF!";
        exit;

    } else {

        // Resetando a query
        $query = NULL;

        // Verificar quantos alunos existem na sala selecionada
        $query = $conn->prepare("SELECT * FROM candidatos WHERE sala_prova = ?");
        $query->execute([ $_POST['sala'] ]);

        // Se a sala tem menos de 50 pessoas...
        if($query->rowCount() < 50) {

            // Adicionar o candidato na tabela de candidatos
            $query = $conn->prepare("INSERT INTO candidatos (cpf, nome, identidade, email, cargo_pretendido, sala_prova) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([ $_POST['cpf'], $_POST['nome'], $_POST['identidade'], $_POST['email'], $_POST['cargo'], $_POST['sala'] ]);
            
            // Exibir mensagem de sucesso
            echo "Candidato adicionado com sucesso!";
            exit;

        } else {

            // Caso contrário, exibir mensagem de erro
            echo "Não foi possível adicionar o candidato. A sala selecionada está cheia!";
            exit;

        }

    }

}

?>