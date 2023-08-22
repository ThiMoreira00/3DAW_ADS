<?php 


  function soma($num1, $num2) {
    return $num1 + $num2;
  }

  function subtracao($num1, $num2) {
    return $num1 - $num2;
  }

  function multiplicacao($num1, $num2) {
    return $num1 * $num2;
  }

  function divisao($num1, $num2) {
    if($num2 != 0) {
      return $num1 / $num2;
    } else {
      return "ERRO!";
    }
  }

  if(isset($_POST)) {

    $num1 = isset($_POST['num1']) ? $_POST['num1'] : "erro";
    $op = isset($_POST['op']) ? $_POST['op'] : "erro";
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : "erro";

    if($num1 == "erro" || $op == "erro" || $num2 == "erro") {
      $resultado = '';
      
    } else {
      
      switch($op) {
      
        case '+': $resultado = soma($num1, $num2); break;
        case '-': $resultado = subtracao($num1, $num2); break;
        case '*': $resultado = multiplicacao($num1, $num2); break;
        case '/': $resultado = divisao($num1, $num2); break;
        default: $resultado = "ERRO!";
      }
    }
    
  } else {
    $resultado = "";
  }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main style="top: 0; right: 0; left: 0; right: 0; position: absolute;">
      <section style="border: 1px solid black; border-radius: 8px;">
      <section id="titulo">
        <h1>Calculadora</h1>
      </section>

    <form method="POST" action="#">
    <fieldset>
        <input type="text" name="resultado" id="resultado" class="rst" disabled value="<?php echo $resultado; ?>">
      <input type="hidden" name="op" id="op" class="rst">
      <input type="hidden" name="num1" id="num1" value="<?php if(isset($_POST)) { echo $resultado; } ?>">
      <input type="hidden" name="num2" id="num2">
    </fieldset>
    
    
    <fieldset>
        <button type="button" onclick="inserir(7);">7</button>
        <button type="button" onclick="inserir(8);">8</button>
        <button type="button" onclick="inserir(9);">9</button>
        <button type="button" onclick="alterarOperacao('+');">+</button>
    </fieldset>
    <fieldset>
        <button type="button" onclick="inserir(4);">4</button>
        <button type="button" onclick="inserir(5);">5</button>
        <button type="button" onclick="inserir(6);">6</button>
        <button type="button" onclick="alterarOperacao('-');">-</button>
    </fieldset>
    <fieldset>
        <button type="button" onclick="inserir(1);">1</button>
        <button type="button" onclick="inserir(2);">2</button>
        <button type="button" onclick="inserir(3);">3</button>
        <button type="button" onclick="alterarOperacao('*');">*</button>
    </fieldset>
    <fieldset style="margin-bottom: 1rem;">
        <button type="button" onclick="inserir(0);">0</button>
        <button type="button" onclick="alterarOperacao('/');">/</button>  
        <input type="submit" name="submit" value="=">
    </fieldset>
    </form>
      </section>
  </main>
    <script>

        var pos = "resultado";
        var operacoes = 0;
        var operando = 1;

        function inserir(numero) {

          if(document.getElementById("num1").value == "ERRO!") {
            alert("Você precisa recarregar a página para usar a calculadora.");
          } else {
            document.getElementById("resultado").value += numero;
            if(operando == 1) {
              document.getElementById("num1").value += numero;
            } else {
              document.getElementById("num2").value += numero;
            }
        }
        }

        function alterarOperacao(operacao) {
          if(document.getElementById("num1").value == "ERRO!") {
            alert("Você precisa recarregar a página para usar a calculadora.");
          } else {
            
            if(operacoes == 0) {
                document.getElementById("op").value = operacao;
              
              document.getElementById("resultado").value += operacao;
              
                operacoes++;
               operando = 2;
            }
            else {
                alert("Operação já foi selecionada!");
            }
        }
          
          }

        

    </script>
  
</body>
</html>
