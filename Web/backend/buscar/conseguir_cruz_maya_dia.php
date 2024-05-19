<?php
$formato = mktime(0, 0, 0, 1, 1, 1720) / (24 * 60 * 60);
$fecha = date("U", strtotime($fecha_consultar)) / (24 * 60 * 60);
$id = $fecha - $formato;
$nahual = $id % 20;
if ($nahual < 0) {
	$nahual = 19 + $nahual;
}
$Query = $conn->query("SELECT n1.nombre,n1.descripcionDiaCruz,n2.nombre as descripcionConcepcionNombre, n2.descripcionConcepcion, n3.nombre as descripcionDestinoNombre, n3.descripcionDestino,n4.nombre as descripcionDerechoNombre, n4.descripcionDerecho,n5.nombre as descripcionIzquierdoNombre, n5.descripcionIzquierdo FROM `nahual` n1 INNER JOIN `nahual` n2 ON n1.idwebNahualCo = n2.idweb INNER JOIN `nahual` n3 ON n1.idwebNahualDe = n3.idweb INNER JOIN `nahual` n4 ON n1.idwebNahualMD = n4.idweb INNER JOIN `nahual` n5 ON n1.idwebNahualMI = n5.idweb WHERE n1.idweb=".$nahual." ;");
$row = mysqli_fetch_assoc($Query);
return $row;
