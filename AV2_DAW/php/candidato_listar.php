<?php 

include_once '../conn.php';


$query = $conn->prepare("SELECT * FROM candidatos ORDER BY nome ASC");
$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
exit;

?>