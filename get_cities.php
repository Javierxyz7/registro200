<?php
include 'con_db.php';

// Habilitar la depuración para ver los errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si el parámetro 'pais_id' está presente en la solicitud
if (isset($_GET['pais_id'])) {
    $pais_id = intval($_GET['pais_id']);
    
    // Verificar si el id del país es válido
    if ($pais_id > 0) {
        $sql = "SELECT id, nombre FROM ciudades WHERE pais_id = $pais_id";
        $result = $conn->query($sql);

        if ($result) {
            $ciudades = array();
            while ($row = $result->fetch_assoc()) {
                $ciudades[] = $row;
            }
            echo json_encode($ciudades);
        } else {
            echo json_encode(array("error" => "Error en la consulta: " . $conn->error));
        }
    } else {
        echo json_encode(array("error" => "ID de país no válido."));
    }
} else {
    echo json_encode(array("error" => "El parámetro 'pais_id' no está presente en la solicitud."));
}

$conn->close();
?>
