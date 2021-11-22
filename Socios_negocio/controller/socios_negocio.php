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




/*
PARA PRUEBA
https://localhost/G3_20/controler/socios_negocio.php?op=get_socios_negocio
https://localhost/G3_20/controler/socios_negocio.php?op=get_socio_negocio
https://localhost/G3_20/controler/socios_negocio.php?op=update_socio_negocio
https://localhost/G3_20/controler/socios_negocio.php?op=insert_socio_negocio
https://localhost/G3_20/controler/socios_negocio.php?op=delete_socio_negocio

{
"id" : "7",
"nombre" : "Dillan",
"razon_social" : "Dillan Corp",
"direccion" : "Choloma",
"tipo_socio" : "2", 
"contacto" : "El DIllon", 
"email" : "dillan@gmail.com",            
"estado" : "1" ,
"telefono" : "01800777"
}
*/ 

require_once("../models/Socios_negocio.php"); 
require_once("../config/conexion.php");

$socios_negocio = new Socios_negocio();

$body = json_decode(file_get_contents("php://input"), true);

switch ($_GET["op"]) {
    case "get_socios_negocio":
        $datos=$socios_negocio->get_socios_negocio();
        echo json_encode($datos);
        break;

    case "get_socio_negocio":
        $datos=$socios_negocio->get_socio_negocio($body["id"]);
        echo json_encode($datos);
        break;

    case "insert_socio_negocio":
        $datos=$socios_negocio->insert_socio_negocio(
            $body["nombre"], 
            $body["razon_social"], 
            $body["direccion"], 
            $body["tipo_socio"], 
            $body["contacto"], 
            $body["email"],             
            $body["estado"], 
            $body["telefono"]);         
        echo json_encode("Socio insertado");
        break;
    
        case "update_socio_negocio":
            $datos=$socios_negocio->update_socio_negocio(
                $body["id"], 
                $body["nombre"], 
                $body["razon_social"], 
                $body["direccion"], 
                $body["tipo_socio"], 
                $body["contacto"], 
                $body["email"],             
                $body["estado"], 
                $body["telefono"]);         
            echo json_encode("Socio actualizado");
            break;    

        case "delete_socio_negocio":
            $datos=$socios_negocio->delete_socio_negocio($body["id"]);         
            echo json_encode("Socio eliminado");
            break;

    default:
        print("Ninguna opcion seleccionada");
        break;
}
