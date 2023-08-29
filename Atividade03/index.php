<?php


  if($_SERVER['REQUEST_METHOD'] == "POST") {

    $disciplina = $_POST['disciplina'];
    $sigla = $_POST['sigla'];
    $carga_horaria = $_POST['carga_horaria'];

    $arq = fopen("disciplinas.txt", "a") or die("Não foi possível abrir o arquivo!");
    $mensagem = "{$disciplina};{$sigla};{$carga_horaria}\n";
    fprintf($arq, $mensagem);
    echo "Registrado com sucesso!";
  }

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD - Disciplina</title>
</head>
<body>
  <form action="http://3dawads.thimoreira00.repl.co/Exercício02/index.php" method="POST"> <!-- Precisei adicionar o link direto do repl.it porque não está funcionando por arquivo "local". -->
    <fieldset>
      <label for="disciplina">Disciplina</label>
      <input type="text" name="disciplina">
    </fieldset>
    <fieldset>
      <label for="sigla">Sigla</label>
      <input type="text" name="sigla" maxlength="4">
    </fieldset>
    <fieldset>
      <label for="carga_horaria">Carga horária</label>
      <input type="number" name="carga_horaria">
    </fieldset>
    <button>Enviar</button>
    
  </form>
</body>
</html>