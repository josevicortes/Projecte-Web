<?php
include("conexion.php");
$conexion->set_charset('utf8');

// Mostrar usuarios antes de la inserción
$sql = $conexion->query("SELECT * FROM usuarios");
$jsonData = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $jsonData[] = $row;
}

echo json_encode($jsonData);

// Insertar nuevo usuario
if (isset($_GET['nombre']) && isset($_GET['password']) && isset($_GET['correo']) && isset($_GET['permisos'])) {
    $user = $_GET['nombre'];
    $password = $_GET['password'];
    $email = $_GET['correo'];
    $permissions = $_GET['permisos'];

    // Utilizar declaración preparada para evitar inyección SQL
    $query = "INSERT INTO `usuarios` (`nombre`, `password`, `correo`, `permisos`) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssss", $user, $password, $email, $permissions);
    $stmt->execute();
    $stmt->close();
}

// Mostrar usuarios después de la inserción
$sql = $conexion->query("SELECT * FROM usuarios");
$jsonData = array();

while ($row = mysqli_fetch_assoc($sql)) {
    $jsonData[] = $row;
}

echo json_encode($jsonData);

$conexion->close();
?>
