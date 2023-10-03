<?php


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD (Aluno) - Listar todos</title>
</head>
<body>
    <h1>CRUD - Listar todos</h1>
    <hr> <!-- Horizontal line (linha horizontal) -->
    <?php 
        // Função include - insere todo o conteúdo de um outro arquivo para este
        include "menu.php";
    ?>

    <!-- Criando a tabela -->
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>E-mail</th>
                <th>Período</th>
            </tr>
        </thead>
        <tbody>

    <?php

        // Inicializando variáveis com valor vazio
        $nome = "";
        $matricula = "";
        $email = "";
        $periodo = "";

        // Abrindo o arquivo para leitura. Caso algo dê errado, o código retornará uma mensagem de erro e finalizará a execução.
        $arqAluno = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo");

        // Inicializando contador
        $x = 1;

        $lista = file("alunos.txt");

        // Enquanto não chegar no final do arquivo...
        // FEOF - File end of file
        while($x < count($lista)) {

            // Separando os dados da linha pelo ponto e vírgula
            $colunaDados = explode(";", $lista[$x]);

            // Obtendo os valores
            $nome = $colunaDados[0];
            $matricula = $colunaDados[1];
            $email = $colunaDados[2];
            $periodo = $colunaDados[3];

            // Exibindo a linha como tabela no HTML
            echo "<tr>";
            echo "<td>". $nome . "</td>";
            echo "<td>". $matricula . "</td>";
            echo "<td>". $email . "</td>";
            echo "<td>". $periodo . "</td>";
            echo "<tr>";
            $x++;
            
        }

        // Fechando o arquivo
        fclose($arqAluno);

        ?>
        </tbody>
        </table>
    
</body>
</html>