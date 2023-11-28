<?php 
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar candidatos | 3DAW_AV2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/funcoesAuxiliares.js"></script>

</head>
<body>
    
    <?php include 'menu.php'; ?>

    <table id="candidatos">
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Identidade</th>
            <th>E-mail</th>
            <th>Cargo</th>
            <th>Sala</th>
        </tr>

    </table>
    <script>
        listarCandidatos();
    </script>
</body>
</html>