<?php 

include_once '../conn.php';


$query = $conn->prepare("SELECT * FROM candidatos WHERE cpf = ?");
$query->execute([ $_POST['cpf'] ]);
$resultado = $query->fetch(PDO::FETCH_ASSOC);

if($query->rowCount() > 0) {
    echo json_encode($resultado);
    exit;

} else {
    echo "erro";
    exit;
}

?>