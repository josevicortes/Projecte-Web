<?php
include("conexion.php");
$conexion->set_charset('utf8');

$sql = $conexion->query("SELECT * FROM usuarios");
$jsonData = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $jsonData[] = $row;
}

echo json_encode($jsonData);

$conexion->close();
?>
