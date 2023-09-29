<?php

//sudo chmod 777 /dev/usb/lp0
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\EscposImage;


try {
    // Establece el conector adecuado para tu impresora
    $connector = new FilePrintConnector("/dev/usb/lp1"); // Reemplaza "/dev/usb/lp1" con el dispositivo de impresora correcto

    /* Inicializa la impresora */
    $printer = new Printer($connector);

    /* Carga la imagen desde un archivo (cambiar "coca.jpg" al nombre de tu imagen) */
    $img = EscposImage::load("coca.jpg", false);

    // Imprime la imagen utilizando bitImage
    $printer->bitImage($img);

    /* Configura la justificación y el tamaño del texto */
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(2, 2);

    /* Imprime el texto */
    $printer->text("Disfruta de esta increible promocion\n");
    $printer->text("Presenta este ticket en caja y recibe 20% de descuento en tu compra\n");
    /* Genera el código QR con el enlace a la página web */
    $url = "https://www.coca-cola.com.mx/"; // Cambia la URL a la página web deseada

    // Tamaño personalizado del código QR (puedes ajustar este valor)
    $qrSize = 6; // El tamaño por defecto es 3

    // Genera e imprime el código QR con el tamaño personalizado
    $printer->qrCode($url, Printer::QR_ECLEVEL_L, $qrSize);

    /* Configura el tamaño del código de barras y la posición del texto */
    $printer->setBarcodeHeight(80); // Aumenta la altura del código de barras
    $printer->setBarcodeWidth(2);
    $printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);

    /* Imprime el código de barras (cambia el contenido a tu código de barras deseado) */
    $printer->barcode("123456789", Printer::BARCODE_CODE39);
    $printer->text("\n");
    $printer->text("\n");

    /* Corta el papel */
    $printer->cut();

    /* Cierra la impresora */
    $printer->close();
} catch (Exception $e) {
    echo "No se pudo imprimir en esta impresora: " . $e->getMessage() . "\n";
}



?>


