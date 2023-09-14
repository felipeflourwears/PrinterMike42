<?php
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

try {
    // Establece el nombre de la impresora que deseas usar
    $printer_name = 'POS'; // Reemplaza con el nombre de tu impresora


    // Crea una instancia de la clase WindowsPrintConnector
    $connector = new WindowsPrintConnector($printer_name);

    // Crea una instancia de la clase Printer
    $printer = new Printer($connector);

    $printer->setJustification(Printer::JUSTIFY_CENTER);


    $printer->setTextSize(2, 2);
    $printer->text("Ticket con PHP");

    $printer->text("¡Felicidades!\n");
    $printer->text("Has completado el juego de memorama.\n");
    


    // Corta el papel (si tu impresora lo soporta)
    $printer->cut();

    // Cierra la conexión con la impresora
    $printer->close();
    
    echo "Impresión exitosa.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
