<?php 

header('Content-Type: application/json');
if ( $_SERVER [ 'REQUEST_METHOD' ] === 'OPTIONS' ) { 
header ( 'Access-Control-Allow-Origin: *' ); 
header ( 'Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS' ); 
header ( 'Access-Control-Allow-Headers: token, Content-Type' ); 
header ( 'Access-Control-Max-Age: 1728000' ); 
header ( 'Content-Length: 0' ); 
header ( 'Content-Type: text/plain' ); 
die (); } 
header ( 'Access-Control-Allow-Origin: *' );

require_once("../models/Facturas.php"); 
require_once("../../config/conexion.php");

$facturas = new Facturas();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case "getFacturas":
        $datos=$facturas->getFacturas();
        echo json_encode($datos);
        break;

    case "getFactura":
        $datos=$facturas->getFactura($body["ID"]);
        echo json_encode($datos);
        break;

    case "insertFactura":
        $datos=$facturas->insertFactura(        
        $body["NUMERO_FACTURA"], 
        $body["ID_SOCIO"], 
        $body["FECHA_FACTURA"], 
        $body["DETALLE"], 
        $body["SUB_TOTAL"],             
        $body["TOTAL_ISV"], 
        $body["TOTAL"],
        $body["FECHA_VENCIMIENTO"]);         
        echo json_encode("Factura ingresada");
        break;

        case "updateFactura":
            $datos=$facturas->updateFactura(
            $body["ID"],
            $body["NUMERO_FACTURA"], 
            $body["ID_SOCIO"], 
            $body["FECHA_FACTURA"], 
            $body["DETALLE"], 
            $body["SUB_TOTAL"],             
            $body["TOTAL_ISV"], 
            $body["TOTAL"],
            $body["FECHA_VENCIMIENTO"],
            $body["ESTADO"]);                  
            echo json_encode("Factura actualizada");
            break;    

        case "deleteFactura":
            $datos=$facturas->deleteFactura($body["ID"]);         
            echo json_encode("Factura eliminada");
            break;

    default:
        print("Ninguna opcion seleccionada");
        break;
}
?>
