<?php
   if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');
    header('content-type: application/json');


    require_once("../Config/Conexion.php");
    require_once("../Models/articulo.php");
    $Articulos=new Articulos();

    $body=json_decode(file_get_contents("php://input"),true);
    

    switch ($_GET["op"]) 
    {
        case "GetArt":
            $datos=$Articulos->Get_articulos();
            echo json_encode($datos);
            break;        
        case "Getunart":
            $datos=$Articulos->Get_articulo_id($body["ID"]);
            echo json_encode($datos);
            break;
        case "InsertarArt":
            $datos=$Articulos->Insert_articulo($body["ID_socio"],$body["Descripcion"],$body["Unidad"],$body["Costo"],$body["Precio"],$body["Aplica_ISV"],$body["Porcentaje_ISV"]);
            echo json_encode("ARTICULO AGREGADO");
            break;

        case "ActualizarArt":
            $datos=$Articulos->actualizar_articulo($body["ID_socio"],$body["Descripcion"],$body["Unidad"],$body["Costo"],$body["Precio"],$body["Aplica_ISV"],$body["Porcentaje_ISV"]);
            echo json_encode("ARTICULO ACTUALIZADO");
            break;    
        case "EliminarArt":
            $datos=$Articulos->Eliminar_articulo($body["ID"]);
            echo json_encode("ARTICULO ELIMINADO");
            break;


    }

?>