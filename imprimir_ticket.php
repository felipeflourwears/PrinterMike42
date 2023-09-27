<?php

//sudo chmod 777 /dev/usb/lp0
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;


try {
    // Enter the device file for your USB printer here
    $connector = new FilePrintConnector("/dev/usb/lp0");

    /* Print a receipt */
    $printer = new Printer($connector);
    //$tux = EscposImage::load("tux.png", false);
    //$printer -> graphics($tux);

    $img = EscposImage::load("coca.jpg", false);
    $testStr = "https://www.coca-cola.com.mx/";
    // Imprime la imagen utilizando bitImage
    $printer->bitImage($img);

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(2, 2);
    $printer -> text("Disfruta de esta increible promocion\n");
    $printer -> text("Presenta este ticket en caja y recibe 20% de descuento en tu compra\n");
    $printer -> feed();
    // Aumenta el tamaño del código QR (por ejemplo, a 8)
    $printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, 8);
    $printer -> text("\n");
    // Configura el tamaño del código de barras y la posición del texto
    $printer->setBarcodeHeight(80);
    $printer->setBarcodeWidth(2);
    $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);

    // Imprime el código de barras
    $printer->barcode("123456789", Printer::BARCODE_CODE39); // Cambia el contenido a tu código de barras deseado
    $printer -> text("\n");
    $printer -> text("\n");
    // Corta el papel
    $printer->cut();

    echo "Impresión exitosa.";

    


    /* Close printer */
    $printer->close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
}


?>


