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

    // Imprime el texto que desees
    $printer->text("¡Hola, impresora POS!\n");
    $printer->text("Esta es una impresión de ejemplo.\n");

    // Corta el papel (si tu impresora lo soporta)
    $printer->cut();

    // Cierra la conexión con la impresora
    $printer->close();
    
    echo "Impresión exitosa.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>