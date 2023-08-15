<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulário</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Calculadora</h1>

	<form action="calcular.php" method="POST">

		<fieldset>
			<label for="num1">Insira um número</label>
			<input type="number" name="num1" id="num1">
		</fieldset>


		<fieldset>
			<label for="operacao">Operação</label>
			<select name="operacao" id="operacao">
				<option value="adicao">Adição</option>
				<option value="subtracao">Subtração</option>
				<option value="multiplicacao">Multiplicação</option>
				<option value="divisao">Divisão</option>
			</select>
		</fieldset>

		<fieldset>
			<label for="num2">Insira outro número</label>
			<input type="number" name="num2" id="num2">
		</fieldset>

		

		<input type="submit" value="Enviar">
	</form>


	<?php

    if(!isset($_POST['operacao'], $_POST['num1'], $_POST['num2'])) {
        $resultado = "ERRO!";

    }
    

    elseif(!is_numeric($_POST['num1']) || !is_numeric($_POST['num2'])) {
        $resultado = "ERRO!";
    }

    else {
        

        switch($_POST['operacao']) {

            case 'adicao': $resultado = $_POST['num1'] + $_POST['num2'];
                break;

            case 'subtracao': $resultado = $_POST['num1'] - $_POST['num2'];
                break;

            case 'multiplicacao': $resultado = $_POST['num1'] * $_POST['num2'];
                break;

            case 'divisao': $resultado = $_POST['num1'] / $_POST['num2'];
                break;

            default: $resultado = "ERRO!";
        }


    }


?>


</body>
</html>
