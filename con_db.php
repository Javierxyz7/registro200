<?php 

$conn = new mysqli("localhost","root","","registro200");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {

}
?>