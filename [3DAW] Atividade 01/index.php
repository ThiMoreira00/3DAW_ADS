<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Calculadora</h1>

    <form>

    <fieldset>
        <input type="number" name="num1" id="num1" class="rst" disabled>
        <input type="number" name="num2" id="num2" class="rst" disabled>
        <input type="number" name="resultado" id="resultado" class="rst" disabled>
        <input type="hidden" name="operacao" id="operacao">
    </fieldset>
    
    
    <fieldset>
        <button type="button" onclick="inserir(7);">7</button>
        <button type="button" onclick="inserir(8);">8</button>
        <button type="button" onclick="inserir(9);">9</button>
        <button type="button" onclick="alterarOperacao('adicao');">+</button>
    </fieldset>
    <fieldset>
        <button type="button" onclick="inserir(4);">4</button>
        <button type="button" onclick="inserir(5);">5</button>
        <button type="button" onclick="inserir(6);">6</button>
        <button type="button" onclick="alterarOperacao('subtracao');">-</button>
    </fieldset>
    <fieldset>
        <button type="button" onclick="inserir(1);">1</button>
        <button type="button" onclick="inserir(2);">2</button>
        <button type="button" onclick="inserir(3);">3</button>
        <button type="button" onclick="alterarOperacao('multiplicacao');">*</button>
    </fieldset>
    <fieldset>
        <button type="button" onclick="inserir(0);">0</button>
        <button type="button" onclick="alterarOperacao('divisao');">/</button>  
        <input type="submit" value="=">
    </fieldset>
    </form>

    
    <script>

        document.getElementById("num2").style.display = "none";
        document.getElementById("resultado").style.display = "none";


        var pos = "num1";
        var operacoes = 0;

        function inserir(numero) {
            document.getElementById(pos).value += numero;
        }

        function alterarOperacao(operacao) {
            if(operacoes == 0) {
                document.getElementById("operacao").value = operacao;
                document.getElementById("num1").style.display = "none";
                document.getElementById("num2").style.display = "block";
                // document.getElementById("num2").value = document.getElementById("num1").value + document.getElementById("operacao").value;
                operacoes++;
                pos = "num2";
            }
            else {
                alert("Operação já foi selecionada!");
            }
        }

        

    </script>
</body>
</html>
