<?php
// Conexión a la base de datos
$conn = include "conexion/conexion.php";
date_default_timezone_set('US/Central');

// Crear un DateTime para el primer y último día del mes
$inicioMes = new DateTime("$anioSeleccionado-$mesSeleccionado-01");
$finMes = clone $inicioMes;
$finMes->modify('last day of this month');

// Intervalo de un día
$intervalo = new DateInterval('P1D');
$periodo = new DatePeriod($inicioMes, $intervalo, $finMes);

// Array para almacenar los resultados
$resultados = [];

// Constantes de cálculo
$formato = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);

foreach ($periodo as $fecha) {
    // Convertir la fecha a formato UNIX dividido por segundos en un día
    $fechaUnix = $fecha->getTimestamp() / (24 * 60 * 60);
    $id = $fechaUnix - $formato;
    $nahual = $id % 20;
    if ($nahual < 0) {
        $nahual = 19 + $nahual; // Corrige la reversión negativa
    }

    // Consultar el nombre del Nahual de la base de datos
    $Query = $conn->query("SELECT nombre FROM nahual WHERE idweb=".$nahual.";");
    $row = mysqli_fetch_assoc($Query);
    $nombreNahual = $row['nombre'];

    // Almacenar el resultado en el array con el día como clave entera
    $resultados[intval($fecha->format('d'))] = $nombreNahual;
}

return $resultados;