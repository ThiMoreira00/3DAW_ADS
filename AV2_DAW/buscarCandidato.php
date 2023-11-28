<?php 
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar candidato | 3DAW_AV2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/funcoesAuxiliares.js"></script>

</head>
<body>
    
    <?php include 'menu.php'; ?>

    <form id="buscarCandidato" method="POST" action="javascript:buscarCandidato();">

        <label for="CPF">CPF</label>
        <input type="text" id="cpf" placeholder="00000000000" required>
        
        <button>Buscar</button>

    </form>

</body>
</html>