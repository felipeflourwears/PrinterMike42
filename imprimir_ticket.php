<?php

//sudo chmod 777 /dev/usb/lp0
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;


try {
    // Enter the device file for your USB printer here
    $connector = new FilePrintConnector("/dev/usb/lp1");

    /* Print a receipt */
    $printer = new Printer($connector);
    //$tux = EscposImage::load("tux.png", false);
    //$printer -> graphics($tux);

    $img = EscposImage::load("coca.jpg", false);

    // Imprime la imagen utilizando bitImage
    $printer->bitImage($img);

    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(2, 2);
    $printer -> text("Disfruta de esta increíble promoción\n");
    $printer -> text("Presenta este ticket en caja y recibe 20% de descuento en tu compra\n");
    $printer -> feed();


    /* Close printer */
    $printer->close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
}


?>


