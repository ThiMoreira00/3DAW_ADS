
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <?php
        if ($resultado != "ERRO!") {
            echo "<p>Resultado: <strong>${resultado}</strong></p>";
        } else {
            echo "<p style='color: red'><strong>ERRO!</strong> Preenchimento inválido.</p>";
        }
        
        
    ?>
    <button onclick="window.history.back()">Voltar para a página anterior</button>
</body>
</html>
