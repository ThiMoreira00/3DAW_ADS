<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Visualizar carrinho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Loja - Visualizar carrinho</h1>
    <hr>
    <?php
        // Incluindo menu
        include "menu.php";
    ?>
    <?php 
        // Se a requisição feita foi por link...
    if($_SERVER["REQUEST_METHOD"] == "GET") {

        // Inicializando contador
        $x = 1;

        // Abrindo o arquivo carrinho.txt. Caso não seja possível, a mensagem de erro será retornada.
        $arqCarrinho = fopen("carrinho.txt", "r") or die("Não foi possível abrir o arquivo.");
    ?>
    <table>
        <thead>
            <tr>
                <th>ID do produto</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php

                // Inicializando o total da compra pra 0
                $total_compra = 0;

                // Lendo o conteúdo do arquivo carrinho.txt
                $dados = file("carrinho.txt");

                // Percorrendo o conteúdo do arquivo
                while($x < count($dados)) {

                    // Separando o conteúdo com ponto e vírgula em array
                    $lista = explode(";", $dados[$x]);

                    // Atribuindo o valor da quantidade * valor no total_compra
                    $total_compra += $lista[1] * $lista[2];

                    // Exibindo a tabela & formulário
                    echo "<tr>";
                    echo "<td>".$lista[0]."</td>";
                    echo "<td>".$lista[1]."</td>";
                    echo "<td>R$".rtrim($lista[2]).",00</td>";
                    echo "<td>R$".$lista[1] * $lista[2].",00</td>";
                    echo "<td>";
                    echo "<form method='POST' action='visualizarCarrinho.php'>";
                    echo "<input type='hidden' name='id_produto' value='".$lista[0]."'>";
                    echo "<input type='submit' value='Remover'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    $x++;
                }

                // Fechando o arquivo
                fclose($arqCarrinho);
            ?>
        </tbody>
    </table>
    <p>Total da compra: R$<?= $total_compra ?>,00</p>

    <?php 
    // Se não (POST)
    } else {
      
        // Lendo o conteúdo do arquivo. Caso não seja possível, uma mensagem de erro será retornada.
        $dados = file("carrinho.txt") or die("Não foi possível fazer a leitura do conteúdo do arquivo de carrinho.");

        // Escrevendo linha do produto
        $arqCarrinho = fopen("carrinho.txt", "w") or die("Não foi possível abrir o arquivo de carrinho.");

        
        // Cabeçalho
        $linha = "id_produto;quantidade;valor";
        fwrite($arqCarrinho, $linha);

        $x = 1;

        // Percorrendo o arquivo de carrinho
        while($x < count($dados)) {

            // Separando o conteúdo com ponto e vírgula em array
            $linha = explode(";", $dados[$x]);

            // Se o ID for igual ao ID do produto a ser removida, desconsiderar
            if($linha[0] != $_POST['id_produto']) {
                fwrite($arqCarrinho, "\n".$linha[0].";".$linha[1].";".$linha[2]);
            }

            $x++;

        }

        // Fechando o arquivo
        fclose($arqCarrinho);
        

        echo "Produto removido do carrinho com sucesso!";

        
    } ?>
</body>
</html>

