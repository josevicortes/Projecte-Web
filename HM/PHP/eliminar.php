<?php
include("conexion.php");
$conexion->set_charset('utf8');

if(isset($_GET['cod_user'])){
    $codigo=$_GET['cod_user'];

    $delete_query="DELETE FROM usuarios WHERE id=$codigo";
    $conexion->query($delete_query);
}

$sql = $conexion->query("SELECT * FROM usuarios");
$jsonData = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $jsonData[] = $row;
}

echo json_encode($jsonData);

$conexion->close();
?>
