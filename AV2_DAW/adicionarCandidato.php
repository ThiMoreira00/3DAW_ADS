<?php 
    include "conn.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar candidato | 3DAW_AV2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/funcoesAuxiliares.js"></script>

</head>
<body>
    
    <?php include 'menu.php'; ?>

    <form id="adicionarCandidato" method="POST" action="javascript:adicionarCandidato();">

        <label for="nome">Nome</label>
        <input type="text" id="nome" placeholder="Nome" required>
        
        <br>
        
        <label for="CPF">CPF</label>
        <input type="text" id="cpf" placeholder="00000000000" required>
        
        <br>
        
        <label for="identidade">Identidade</label>
        <input type="text" id="identidade" placeholder="000000000" required>

        <br>
        
        <label for="email">E-mail</label>
        <input type="email" id="email" placeholder="seuemail@gmail.com" required>

        <br>
        
        <label for="cargo_pretendido">Cargo pretendido</label>
        <select id="cargo" required>
            <?php 

                $query = $conn->prepare("SELECT * FROM sala_prova");
                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado as $cargo) { 
                    echo "<option value='".$cargo['cargo']."'>".$cargo["cargo"]."</option>";
                }
            
            ?>
        </select>

        <br>
        
        <label for="sala_prova">Sala de prova</label>
        <select id="sala" required>
        <?php
            $query = $conn->prepare("SELECT * FROM sala_prova");
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultado as $sala) {
                echo "<option value='".$sala['id']."'>".$sala["id"]."</option>";
            }
            
        ?>
        </select>

        <br><br>
        <button>Adicionar</button>

    </form>

</body>
</html>