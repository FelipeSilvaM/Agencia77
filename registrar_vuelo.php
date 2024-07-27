<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "AGENCIA";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$origen = $conn->real_escape_string($_POST['origen']);
$destino = $conn->real_escape_string($_POST['destino']);
$fecha = $conn->real_escape_string($_POST['fecha']);
$plazas = $conn->real_escape_string($_POST['plazas_disponibles']);
$precio = $conn->real_escape_string($_POST['precio']);

$sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES ($origen, $destino, $fecha, $plazas, $precio)";

if($conn->query($sql) === TRUE) {
    echo "Nuevo vuelo registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
