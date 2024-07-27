<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "AGENCIA";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = $conn->real_escape_string($_POST['nombre']);
$ubicacion = $conn->real_escape_string($_POST['ubicacion']);
$habitaciones = $conn->real_escape_string($_POST['habitaciones_disponibles']);
$tarifa = $conn->real_escape_string($_POST['tarifa_noche']);

$sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUE ($nombre, $ubicacion, $habitaciones, $tarifa)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo hotel registrado exitosamente";
} else {
    echo "Error: " .$sql ."<br>" .$conn->error;
}

$conn->close();
?>