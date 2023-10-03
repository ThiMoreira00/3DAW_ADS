<?php

    
    // Como o formulário abaixo está realizando um método para POST, então, é necessário verificar se teve alguma requisição POST.
    // Se teve requisição por POST...
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Armazenando os valores inseridos no formulário em variáveis
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $periodo = $_POST['periodo'];

        // Montando a linha a ser inserida no arquivo de texto
        // OBSERVAÇÃO: Os pontos entre variáveis e strings é um dos métodos de concatenação do PHP. Saiba mais em: https://www.php.net/manual/pt_BR/language.operators.string.php
        $texto = "\n" . $nome . ";" . $matricula . ";" . $email . ";" . $periodo;

        // Se o arquivo não existir...
        if(!file_exists("alunos.txt")) {

            // ... criar um arquivo com o cabeçalho (em formato WRITE - escrever, apagando todo o conteúdo do arquivo) e inserir o conteúdo.
            // OBSERVAÇÃO: Existem métodos para abrir um arquivo no PHP. Saiba mais em: https://www.php.net/manual/pt_BR/function.fopen.php
            $arqAluno = fopen("alunos.txt", "w");

            // Montando o cabeçalho do arquivo (linha para organização das colunas)
            $cabecalho = "nome;matricula;email;periodo";

            // Escrevendo o cabeçalho e o texto no arquivo "alunos.txt"
            fwrite($arqAluno, $cabecalho);
            fwrite($arqAluno, $texto);

        // Se existir...
        } else {

            /// ... abra o arquivo em formato APPEND (escrita, mantendo o conteúdo)
            $arqAluno = fopen("alunos.txt", "a");

            // Escrevendo o texto no arquivo "alunos.txt"
            fwrite($arqAluno, $texto);

        }

        // Fechando o arquivo
        fclose($arqAluno);

        echo "Aluno adicionado com sucesso!";
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD (Aluno) - Adicionar</title>
</head>
<body>
    <h1>CRUD - Adicionar</h1>
    <hr> <!-- Horizontal line (linha horizontal) -->
    <?php 
        // Função include - insere todo o conteúdo de um outro arquivo para este
        include "menu.php";
    ?>


    <!-- O método do formulário é POST, ou seja, os dados serão enviados para o servidor. 
        Quando o formulário fizer "submit", o próprio arquivo será chamado, executando o código PHP antes do código em HTML. 
    -->
    <form action="adicionarAluno.php" method="POST"> 

        <label for="nome">Nome do aluno:</label>
        <input type="text" name="nome" required>

        <label for="matricula">Matrícula do aluno:</label>
        <input type="number" name="matricula" required>

        <label for="email">E-mail do aluno:</label>
        <input type="email" name="email" required>

        <label for="periodo">Período do aluno:</label>
        <select name="periodo" id="periodo">
            <option value="1">1° período</option>
            <option value="2">2° período</option>
            <option value="3">3° período</option>
            <option value="4">4° período</option>
            <option value="5">5° período</option>
        </select>

        <!-- Botão de envio do formulário -->
        <input type="submit" value="Adicionar">

    </form>
</body>
</html>