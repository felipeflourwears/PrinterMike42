<?php
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

try {
    // Establece el nombre de la impresora que deseas usar
    $printer_name = 'POS'; // Reemplaza con el nombre de tu impresora

    // Crea una instancia de la clase WindowsPrintConnector
    $connector = new WindowsPrintConnector($printer_name);

    // Crea una instancia de la clase Printer
    $printer = new Printer($connector);

    // Carga la imagen desde una ubicación en tu servidor
    $image_path = 'img/coca.jpg'; // Reemplaza con la ruta correcta en tu servidor

    // Verifica si la extensión GD está habilitada en PHP
    if (extension_loaded('gd')) {
        // Abre la imagen utilizando GD
        $image = imagecreatefrompng($image_path);

        // Imprime la imagen en el ticket
        $printer->bitImage($image);

        // Libera la memoria de la imagen
        imagedestroy($image);
    } else {
        echo "La extensión GD no está habilitada en PHP.";
    }

    // Corta el papel (si tu impresora lo soporta)
    $printer->cut();

    // Cierra la conexión con la impresora
    $printer->close();
    
    echo "Impresión exitosa.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
