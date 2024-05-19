<?php session_start(); ?>
<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

if (isset($_GET['mes']) && isset($_GET['anio'])) {
    $mesSeleccionado = $_GET['mes'];
    $anioSeleccionado = $_GET['anio'];
} else {
    $mesSeleccionado = date('n'); // Mes actual
    $anioSeleccionado = date('Y'); // Año actual
}

$nahuals = include 'backend/buscar/conseguir_nahual_nombre_mes.php';
$energias = include 'backend/buscar/conseguir_energia_numero_mes.php';
$haabs = include 'backend/buscar/conseguir_uinal_nombre_mes.php';
// $cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';

// construir el array de los días del mes seleccionado
$inicioMes = new DateTime("$anioSeleccionado-$mesSeleccionado-01");
$finMes = clone $inicioMes;
$finMes->modify('last day of this month');
foreach (new DatePeriod($inicioMes, new DateInterval('P1D'), $finMes) as $fecha) {
    $dia = intval($fecha->format('d'));
    $nahual = $nahuals[$dia];
    $energia = $energias[$dia];
    $haab = $haabs[$dia];
    $diasMes[$dia] = [
        'nahual' => $nahual,
        'energia' => $energia,
        'cholquij' => $nahual . " " . strval($energia),
        'haab' => $haab
    ];
}

// print_r($diasMes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calendario GregoMaya</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calendario.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>

    <div>
        <section id="inicio" style="height: 140vh;">
            <div id="inicioContainer" class="inicio-container">
                <div id='formulario2'>
                    <?php
                    // Configura el locale a Español
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'Spanish_Spain.1252');
                    ?>
                    <h1>Calendario - <?php echo ucfirst(strftime('%B', mktime(0, 0, 0, $mesSeleccionado, 1))) . ' ' . $anioSeleccionado; ?></h1>

                    <!-- Formulario para seleccionar el mes y año -->
                    <div class="selector-fecha">
                        <form action="" method="get">
                            <select name="mes" onchange="this.form.submit()">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $mesNombre = strftime('%B', mktime(0, 0, 0, $i, 10)); // Obtén el nombre del mes
                                    $selected = ($i == $mesSeleccionado) ? 'selected' : ''; // Asegura que el mes seleccionado se mantenga
                                    echo "<option value='$i' $selected>$mesNombre</option>";
                                }
                                ?>
                            </select>
                            <select name="anio" onchange="this.form.submit()">
                                <?php
                                $yearActual = date('Y'); // Año actual para inicialización
                                for ($j = $yearActual - 5; $j <= $yearActual + 5; $j++) {
                                    $selected = ($j == $anioSeleccionado) ? 'selected' : ''; // Asegura que el año seleccionado se mantenga
                                    echo "<option value='$j' $selected>$j</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                    <div class="calendar-container">
                        <table class="calendar">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th>Dom.</th>
                                    <th>Lun.</th>
                                    <th>Mar.</th>
                                    <th>Mie.</th>
                                    <th>Jue.</th>
                                    <th>Vie.</th>
                                    <th>Sab.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los días del calendario serán generados por JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <br><br>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>

    <script>
        // Datos de los días del mes
        const diasMes = <?php echo json_encode($diasMes); ?>;        
    </script>
    <script src="js/calendario.js"></script>

</body>

</html>