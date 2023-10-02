# Configuración de Impresora en Linux

Este archivo README proporciona instrucciones para verificar que Apache esté encendido y cómo configurar una impresora en Linux. Además, se incluyen pasos para cambiar los permisos de la impresora y realizar una impresión de prueba.

## Verificar el estado de Apache

Para verificar si Apache está encendido en tu sistema Linux, puedes ejecutar el siguiente comando:

```bash
sudo systemctl status apache2
```
Si Apache no está en ejecución, puedes usar los siguientes comandos para reiniciar o detener y volver a encender Apache según sea necesario:

```bash
sudo systemctl restart apache2  # Para reiniciar Apache
sudo systemctl stop apache2     # Para detener Apache
sudo systemctl start apache2    # Para volver a encender Apache
```

## Configuración del Driver de la Impresora
Asegúrate de que el driver de la impresora esté configurado correctamente en la carpeta DriversLinuxIT-POS. Si tu sistema operativo muestra la impresora como "Unknown" y la configuración de generación es "RAW", esto es lo que debes hacer.

## Cambiar los permisos de la impresora
Para cambiar los permisos de la impresora, puedes utilizar los siguientes comandos. En este ejemplo, estamos cambiando los permisos para lp0, pero debes ajustarlos según tu impresora.

```bash
sudo chmod 777 /dev/usb/lp0
```
Asegúrate de que los permisos sean los adecuados para que tu sistema pueda comunicarse con la impresora.

## Impresión de Prueba
Puedes realizar una impresión de prueba con el siguiente comando. Asegúrate de sustituir el mensaje "Hello" por el que desees imprimir.

```bash
sudo echo "Hello" >> /dev/usb/lp0
```
Este comando enviará el mensaje al dispositivo de impresión y deberías ver la impresión de la prueba físicamente en la impresora.

## Rules Configuración por Default

O también puedes crear reglas que tepermitan ya interactuar de manera que al iniciar el sistema operativo ya no hagas uso de sudo
Agrega reglas udev (opcional): Si necesitas cambiar los permisos de manera persistente, puedes crear una regla udev. Las reglas udev son utilizadas por el sistema operativo para gestionar dispositivos y permisos. Crea un archivo de regla en /etc/udev/rules.d/ con una extensión .rules y define las reglas necesarias. Por ejemplo:
```bash
sudo nano /etc/udev/rules.d/99-usb-printer.rules

```

Y dentro de ese archivo, puedes agregar una regla como esta:
```bash
SUBSYSTEM=="usb", ATTRS{idVendor}=="XXXX", ATTRS{idProduct}=="XXXX", MODE="0666"

```

Donde XXXX debe ser reemplazado con el ID del fabricante y el ID del producto de tu impresora. Puedes encontrar esta información ejecutando el comando lsusb en una terminal.

Recargar las reglas udev: Después de crear la regla, debes recargar las reglas udev para que surtan efecto:

```bash
sudo udevadm control --reload-rules
sudo udevadm trigger
```
Reiniciar la computadora: Después de realizar estos cambios, reinicia tu computadora y verifica si los permisos se aplican correctamente a los dispositivos /dev/usb/lpX.


## Ticket Output

<img src="ticket.jpg" alt="Ticket" width="350" height="150">