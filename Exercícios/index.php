<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercícios | <?= date("d/m/Y") ?></title> <!-- Feito em 22/08/2023 -->
</head>
<body>
  <h1>Percorrendo array</h1>

  <?php 


  // Para criar um novo array, basta usar a função "array"
  $arr = array("3ALG", "3DAW", "3RSD", "3POB", "3ESD", "3PBD");

  // Percorrendo array/vetor de 0 até a quantidade de elementos no array (função "count")
  for($i=0;$i<count($arr);$i++) {
    echo "Matéria {$i}: {$arr[$i]}";
    echo "<br>";
  }

  ?>
</body>
</html>