

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD (Aluno) - Editar</title>
</head>
<body>
    <h1>CRUD - Editar</h1>
    <hr> <!-- Horizontal line (linha horizontal) -->
    <?php 
        // Função include - insere todo o conteúdo de um outro arquivo para este
        include "menu.php";
    ?>


    <?php

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        // Inicializando variáveis com valor vazio
        $nome = "";
        $matricula = "";
        $email = "";
        $periodo = "";
        
        // Abrindo o arquivo para leitura. Caso algo dê errado, o código retornará uma mensagem de erro e finalizará a execução.
        $arqAluno = fopen("alunos.txt", "r") or die("Erro ao abrir arquivo.");
        
        // Inicializando contador
        $x = 1;
        $achou = 0;

        $lista = file("alunos.txt");
        
        // Enquanto não chegar no final do arquivo...
        // FEOF - File end of file
        while($x < count($lista)) {
        
            // Separando os dados da linha pelo ponto e vírgula
            $colunaDados = explode(";", $lista[$x]);
        
            if($_GET["matricula"] == $colunaDados[1]) { 
                $achou = 1;
                echo '<form action="editar.php" method="POST"> ';

                echo '<label for="nome">Nome do aluno:</label>';
                echo '<input type="text" name="nome" value="'.$colunaDados[0].'" required>';

                echo '<label for="matricula">Matrícula do aluno:</label>';
                echo '<input type="number" name="matricula" value="'.$colunaDados[1].'"required>';

                echo '<label for="email">E-mail do aluno:</label>';
                echo '<input type="email" name="email" value="'.$colunaDados[2].'"required>';

                echo '<label for="periodo">Período do aluno:</label>';
                echo '<select name="periodo" id="periodo">';
                echo '<option value="1"'; if($colunaDados[3] == 1) { echo "selected"; } echo '1° período</option>';
                echo '<option value="2"'; if($colunaDados[3] == 2) { echo "selected"; } echo '>2° período</option>';
                echo '<option value="3"'; if($colunaDados[3] == 3) { echo "selected"; } echo '>3° período</option>';
                echo '<option value="4"'; if($colunaDados[3] == 4) { echo "selected"; } echo '>4° período</option>';
                echo '<option value="5"'; if($colunaDados[3] == 5) { echo "selected"; } echo '>5° período</option>';
                echo '</select>';
                
                echo '<input type="submit" value="Editar">';

                echo '</form>';
                break;
                
            } else {
                $x++;
            }
            
        }

        if($achou == 0) {
            echo "Não foi possível localizar o aluno com esta matrícula.";
        }
        
        // Fechando o arquivo
        fclose($arqAluno);
        
    } else {


        


    }
    ?>
    
</body>
</html>