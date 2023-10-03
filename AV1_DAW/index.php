<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - AV1_DAW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Loja</h1>
    <?php
        // Incluindo menu
        include "menu.php";
    ?>
    <hr>

    <?php 

        // Se a requisição feita foi por link...
        if($_SERVER["REQUEST_METHOD"] == "GET") {

            // Inicializando contador
            $x = 1;

            // Abrindo o arquivo produtos.txt. Caso não seja possível, a mensagem de erro será retornada.
            $arqProduto = fopen("produtos.txt", "r") or die("Não foi possível abrir o arquivo.");
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Lendo o conteúdo do arquivo produtos.txt
                $dados = file("produtos.txt");

                // Percorrendo o conteúdo do arquivo
                while($x < count($dados)) {

                    // Separando o conteúdo com ponto e vírgula em array
                    $lista = explode(";", $dados[$x]);

                    // Exibindo a tabela & formulário
                    echo "<tr>";
                    echo "<td>".$lista[0]."</td>";
                    echo "<td>".$lista[1]."</td>";
                    echo "<td>".$lista[2]."</td>";
                    echo "<td>";
                    echo "<form method='POST' action='index.php'>";
                    echo "<input type='hidden' name='id_produto' value='".$lista[0]."'>";
                    echo "<input type='hidden' name='valor_produto' value='".$lista[2]."'>";
                    echo "<input type='number' name='quantidade' min=0>";
                    echo "<input type='submit' value='Adicionar'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    $x++;
                }
                
                // Fechando o arquivo
                fclose($arqProduto);
            ?>
        </tbody>
    </table>
    <?php 
    
    // Se não (POST)
    } else {

      
      $carrinho = file("carrinho.txt") or die("Não foi possível abrir o arquivo de carrinho.");
      
      // Abrindo o arquivo com APPEND. Caso não seja possível, uma mensagem de erro será retornada.
      $arqCarrinho = fopen("carrinho.txt", "w") or die("Não foi possível abrir o arquivo de carrinho.");

      $linha = "id_produto;quantidade;valor";
        fwrite($arqCarrinho, $linha);

        // Escrevendo linha do produto
        // $linha = "\n".$_POST['id_produto'].";".$_POST['quantidade'].";".$_POST['valor_produto'];
        // fwrite($arqCarrinho, $linha);

        // Verificando se existe o ID do arquivo no carrinho
        $x = 1;
        $verificarLista = false;

        while($x < count($carrinho)) {

            $linha = explode(";", $carrinho[$x]);

            if($linha[0] == $_POST['id_produto']) {
                $linha[1] += $_POST['quantidade'];
            }

            fwrite($arqCarrinho, "\n".$linha[0].";".$linha[1].";".$linha[2]);
            $verificarLista = true;
            $x++;
        }


        if($verificarLista == false) {
            fwrite($arqCarrinho, "\n".$_POST["id_produto"].";".$_POST["quantidade"].";".$_POST["valor_produto"]);
        }


        // Fechando o arquivo
        fclose($arqCarrinho);

        echo "Produto adicionado no carrinho com sucesso!";

        
    } ?>
</body>
</html>
