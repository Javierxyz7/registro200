<?php
include 'con_db.php';

$sql = "SELECT id, nombre FROM paises";
$result = $conn->query($sql);

$paises = array();
while ($row = $result->fetch_assoc()) {
    $paises[] = $row;
}

echo json_encode($paises);

$conn->close();
?>
