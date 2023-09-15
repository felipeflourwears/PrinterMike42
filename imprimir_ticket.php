<?php
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;

 // Establece el nombre de la impresora que deseas usar
 $printer_name = 'POS'; // Reemplaza con el nombre de tu impresora

 // Crea una instancia de la clase WindowsPrintConnector
 $connector = new WindowsPrintConnector($printer_name);

 // Crea una instancia de la clase Printer
 $printer = new Printer($connector);

try {


   

    $printer->setTextSize(3, 3);
    $printer->text("Coca Cola\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    
    $printer->text("\n");
    $printer->setTextSize(1, 1);
    $printer->text("Congratulations!\n"); // Cambiar el mensaje a inglés
    $printer->text("Enjoy this amazing promotion.\n"); // Cambiar el mensaje a inglés
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("Present this ticket at the checkout and receive a 20% discount on your purchase.\n"); // Cambiar el mensaje a inglés
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    $printer->text("\n");
    
    


   
    
    echo "Impresión exitosa.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();

}

 // Corta el papel (si tu impresora lo soporta)
 $printer->cut();

 // Cierra la conexión con la impresora
 $printer->close();
?>


