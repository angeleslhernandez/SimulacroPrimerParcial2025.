<?php

include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';
include_once 'Empresa.php';
//Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.

$objCliente1 = new Cliente("Lucia", "Hernandez", "DNI", "43948452", true);
$objCliente2 = new Cliente("Javier ", "Taboada", "DNI", "42330984", true);
//Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo.

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
//Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].

$colMotos = [$objMoto1, $objMoto2, $objMoto3];
$colClientes = [$objCliente1, $objCliente2];
$colVentas = [];

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $colClientes, $colMotos, $colVentas);
/*Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido*/
$colCodigos = [];
foreach ($colMotos as $moto) {
    $colCodigos[] = $moto->getCodigo();
}
$venta1 = $objEmpresa->registrarVenta($colCodigos, $objCliente2);
echo "Venta 1 (codigos 11,12,13): $venta1 \n";
/*Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido*/

$venta2 = $objEmpresa->registrarVenta([0], $objCliente2);
echo "Venta 2 (codigo 0): $venta2 \n";

/*nvocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido*/
$venta3 = $objEmpresa->registrarVenta([2], $objCliente2);
echo "Venta 3 (codigo 2): $venta3 \n";

/* Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1*/

echo "Ventas del Cliente 1:\n";
$ventasCliente1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDoc(), $objCliente1->getDoc());
foreach ($ventasCliente1 as $venta) {
    echo $venta . "\n";
}

/*Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
*/
echo "Ventas del Cliente 2:\n";
$ventasCliente2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDoc(), $objCliente2->getDoc());
foreach ($ventasCliente2 as $venta) {
    echo $venta . "\n";
}


// Realizar un echo de la variable Empresa creada en 2.
echo "Empresa: \n";
echo $objEmpresa;
