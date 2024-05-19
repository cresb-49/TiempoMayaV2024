<?php
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']);
    $filepath = './Calendario_Blender/' . $filename; // Ajusta el path según tu estructura de directorios

    if (file_exists($filepath)) {
        // Establece los encabezados
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Limpia el buffer del sistema

        // Envía el archivo al navegador
        readfile($filepath);
        exit;
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se especificó ningún archivo.";
}
?>
