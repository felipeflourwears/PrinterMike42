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
   
    $tux = EscposImage::load("coca.jpg", false);
    $printer -> bitImage($tux);

   

    $printer->setJustification(Printer::JUSTIFY_CENTER);

    $printer->setTextSize(2, 2);
    $printer->text("Coca Cola\n");
    $printer->setTextSize(1, 1);
    $printer->text("¡Felicidades!\n");
    $printer->text("Disfruta de esta increible promocion.\n");
    $printer->text("Presenta este ticket en caja y recibe 20% de descuento en tu compra.\n");
    $printer->text("\n");
    $printer->text("\n");
    
    $printer -> bitImage($tux, Printer::IMG_DOUBLE_WIDTH | Printer::IMG_DOUBLE_HEIGHT);
    $printer -> text("Large Tux in correct proportion (bit image).\n");
    


   
    
    echo "Impresión exitosa.";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();

}

 // Corta el papel (si tu impresora lo soporta)
 $printer->cut();

 // Cierra la conexión con la impresora
 $printer->close();
?>


