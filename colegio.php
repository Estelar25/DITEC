<?php

$servername = "localhost";
$username   = "root";   
$password   = "";       
$dbname     = "ditec"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}


$nombre           = $_POST['nombre'];
$apellido         = $_POST['npellido'];
$fecha_inicio     = $_POST['fecha_inicio'];
$edad             = $_POST['edad'];
$tipo_documento   = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$celular          = $_POST['celular'];
$correo           = $_POST['correo'];
$rango            = $_POST['rango'];
$grado            = $_POST['grado'];


$sql = "INSERT INTO estudiantes 
        (nombre, apellido, fecha_inicio, edad, tipo_documento, numero_documento, celular, correo, rango, grado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $nombre, $apellido, $fecha_inicio, $edad, $tipo_documento, $numero_documento, $celular, $correo, $rango, $grado);

if ($stmt->execute()) {
    echo "<h2> Registro exitoso</h2>";
    echo "<a href='index.html'>Volver al formulario</a>";
} else {
    echo " Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>