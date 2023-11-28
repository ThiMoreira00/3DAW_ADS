<?php 

include_once '../conn.php';

// Verificando se existe alguém com o mesmo CPF / email
$query = $conn->prepare("SELECT cpf FROM candidatos WHERE cpf = ?");
$query->execute([ $_POST['cpf'] ]);

// Se tiver alguma entrada...
if($query->rowCount() == 0) {

    // ... notificar que não é possível adicionar.
    echo "Não existe um candidato com este CPF.";
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
        $query = $conn->prepare("UPDATE candidatos SET sala_prova = ? WHERE cpf = ?");
        $query->execute([ $_POST['sala'], $_POST['cpf'] ]);

        // Exibir mensagem de sucesso
        echo "Candidato alterado com sucesso!";
        exit;

    } else {

        // Caso contrário, exibir mensagem de erro
        echo "Não foi possível alterar o candidato. A sala selecionada está cheia!";
        exit;

    }

}



?>