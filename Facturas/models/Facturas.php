<?php

require_once("../config/conexion.php");
class Facturas extends Conectar{

    public function getFacturas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * from ma_facturas;";
        $sql=$conectar->prepare($sql);
        $sql->execute();        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFactura($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * from ma_facturas where id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertFactura(
        $NUMERO_FACTURA,
        $ID_SOCIO,
        $FECHA_FACTURA, 
        $DETALLE,
        $SUB_TOTAL,
        $TOTAL_ISV,
        $TOTAL,
        $FECHA_VENCIMIENTO){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT into ma_facturas(
            NUMERO_FACTURA,
            ID_SOCIO,
            FECHA_FACTURA, 
            DETALLE,
            SUB_TOTAL,
            TOTAL_ISV,
            TOTAL,
            FECHA_VENCIMIENTO,
            ESTADO)
            values (?,?,?,?,?,?,?,?,'F');";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NUMERO_FACTURA); 
        $sql->bindValue(2, $ID_SOCIO); 
        $sql->bindValue(3, $FECHA_FACTURA); 
        $sql->bindValue(4, $DETALLE); 
        $sql->bindValue(5, $SUB_TOTAL); 
        $sql->bindValue(6, $TOTAL_ISV);         
        $sql->bindValue(7, $TOTAL); 
        $sql->bindValue(8, $FECHA_VENCIMIENTO);        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFactura(
        $ID,
        $NUMERO_FACTURA,
        $ID_SOCIO,
        $FECHA_FACTURA, 
        $DETALLE,
        $SUB_TOTAL,
        $TOTAL_ISV,
        $TOTAL,
        $FECHA_VENCIMIENTO,
        $ESTADO){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_facturas set 
        NUMERO_FACTURA = ?,
        ID_SOCIO = ?,
        FECHA_FACTURA = ?, 
        DETALLE = ?,
        SUB_TOTAL = ?,
        TOTAL_ISV = ?,
        TOTAL = ?,
        FECHA_VENCIMIENTO = ?,
        ESTADO = ? 
        where ID = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NUMERO_FACTURA); 
        $sql->bindValue(2, $ID_SOCIO); 
        $sql->bindValue(3, $FECHA_FACTURA); 
        $sql->bindValue(4, $DETALLE); 
        $sql->bindValue(5, $SUB_TOTAL); 
        $sql->bindValue(6, $TOTAL_ISV);         
        $sql->bindValue(7, $TOTAL); 
        $sql->bindValue(8, $FECHA_VENCIMIENTO);
        $sql->bindValue(9, $ESTADO);
        $sql->bindValue(10, $ID);        
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFactura($ID){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE from ma_facturas where id = ?;";
        $sql=$conectar->prepare($sql);                
        $sql->bindValue(1, $ID);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }



}
?>
