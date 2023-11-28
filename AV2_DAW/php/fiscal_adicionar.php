<?php 

include_once '../conn.php';

// Verificando se existe alguém com o mesmo CPF / email
$query = $conn->prepare("SELECT cpf FROM fiscais WHERE cpf = ?");
$query->execute([ $_POST['cpf'] ]);

// Se tiver alguma entrada...
if($query->rowCount() > 0) {

    // ... notificar que não é possível adicionar.
    echo "Não foi possível adicionar o fiscal. Já existe um fiscal com o mesmo CPF!";
    exit;

} else {

    // Resetando a query
    $query = NULL;

    // Verificando se existe algum fiscal com o mesmo CPF
    $query = $conn->prepare("SELECT cpf FROM candidatos WHERE cpf = ?");
    $query->execute([ $_POST['cpf'] ]);

    // Se tiver alguma entrada...
    if($query->rowCount() > 0) {

        // ... notificar que não é possível adicionar.
        echo "Não foi possível adicionar o fiscal. Já existe um candidato com o mesmo CPF!";
        exit;

    } else {

        // Verificando quantos fiscais existem na sala
        $query = $conn->prepare("SELECT * FROM fiscais WHERE sala_prova = ?");
        $query->execute([ $_POST['sala'] ]);

        // Se a sala possui menos de 2 fiscais...
        if($query->rowCount() < 2) {

            // ... adicionar o fiscal e alocar ele para a sala selecionada
            $query = $conn->prepare("INSERT INTO fiscais (nome, cpf, sala_prova) VALUES (?, ?, ?)");
            $query->execute([ $_POST['nome'], $_POST['cpf'], $_POST['sala'] ]);

            // Exibir mensagem de sucesso
            echo "Fiscal adicionado com sucesso!";
            exit;

        } else {

            echo "Não foi possível adicionar o fiscal. A sala selecionada já possui 2 fiscais!";
            exit;

        }

    }

}

?>