

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
</head>
<body>
  <h1>Calculadora</h1>

  <form method="POST" action="index.php">
      <label for="num1">Primeiro número</label>
      <input type="number" name="num1" id="num1">

      <label for="operador">
          <select name="operador" id="operador">
            <option value="+">Adição</option>
            <option value="-">Subtração</option>
            <option value="*">Multiplicação</option>
            <option value="/">Divisão</option>
            <option value="sqrt">Raiz Quadrada</option>
            <option value="exp">Exponenciação de N</option>
            <option value="sin">Seno</option>
            <option value="cos">Cosseno</option>
            <option value="tg">Tangente</option>
        </select>
        
        <label for="num2">Segundo número</label>
      <input type="number" name="num2" id="num2">
    <input type="submit" value="Calcular" id="calcular">
    </form>
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
        case 'sqrt': $resultado = sqrt($num1); break;
        case 'exp': $resultado = pow($num1, $num2); break;
        case 'sin': $resultado = sin($num1); break;
        case 'cos': $resultado = cos($num1); break;
        case 'tg': $resultado = tan($num1); break;
        default: $resultado = "ERRO!";
      }
    }
    
  } else {
    $resultado = "";
  }


echo $resultado;
?>
</body>
</html>
