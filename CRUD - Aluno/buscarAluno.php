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
    <?php if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
        <form action="buscarAluno.php" method="POST">
            <label for="matricula">Matrícula do aluno:</label>
            <input type="number" name="matricula" required>

            <input type="submit" value="Buscar">
        </form>
    <?php } else {


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
        while ($x < count($lista)) {

            // Separando os dados da linha pelo ponto e vírgula
            $colunaDados = explode(";", $lista[$x]);

            if ($_POST["matricula"] == $colunaDados[1]) {
                $achou = 1;
                echo "<table>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Matrícula</th>";
                echo "<th>E-mail</th>";
                echo "<th>Período</th>";
                echo "<th>Ações</th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $colunaDados[0] . "</td>";
                echo "<td>" . $colunaDados[1] . "</td>";
                echo "<td>" . $colunaDados[2] . "</td>";
                echo "<td>" . $colunaDados[3] . "</td>";
                echo "<td><button><a href='editarAluno.php?matricula=" . $colunaDados[1] . "'>Editar aluno</a></button><button><a href='excluirAluno.php?matricula=" . $colunaDados[1] . "'>Excluir aluno</a></button>";
                echo "</td>";
                echo "</tr>";
                break;

            } else {
                $x++;
            }

        }

        if ($achou == 0) {
            echo "Não foi possível localizar o aluno com esta matrícula.";
        }
        // Fechando o arquivo
        fclose($arqAluno);

    } ?>
</body>

</html>