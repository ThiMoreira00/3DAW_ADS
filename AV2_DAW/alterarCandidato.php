<?php 
    include "conn.php";

    if(!isset($_GET['cpf'])) {
        header("Location: /3DAW_AV2/buscarCandidato.php");
        exit;
    }

    $query = $conn->prepare("SELECT * FROM candidatos WHERE cpf = ?");
    $query->execute([ $_GET['cpf'] ]);
    $candidato = $query->fetch(PDO::FETCH_ASSOC);

    if(!$candidato) {
        header("Location: /404");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar candidato | 3DAW_AV2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/funcoesAuxiliares.js"></script>

</head>
<body>
    
    <?php include 'menu.php'; ?>

    <form id="adicionarCandidato" method="POST" action="javascript:alterarCandidato();">

        <label for="nome">Nome</label>
        <input type="text" id="nome" value="<?= $candidato['nome'] ?>" required>
        
        <br>
        
        <label for="CPF">CPF</label>
        <input type="text" id="cpf" value="<?= $candidato['cpf'] ?>" required disabled>

        <br>
        
        <label for="sala_prova">Sala de prova</label>
        <select id="sala" required>
        <?php
            $query = $conn->prepare("SELECT * FROM sala_prova");
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultado as $sala) {
                if($sala['id'] == $candidato['sala_prova']) {
                    echo "<option selected value='".$sala['id']."'>".$sala["id"]."</option>";

                } else {
                    echo "<option value='".$sala['id']."'>".$sala["id"]."</option>";

                }
                
            }
            
        ?>
        </select>

        <br><br>
        <button>Alterar</button>

    </form>

</body>
</html>