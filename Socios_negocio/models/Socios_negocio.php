<?php

require_once("../../config/conexion.php");
class Socios_negocio extends Conectar{

    public function get_socios_negocio(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * from ma_socios_negocio where estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();        
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_socio_negocio($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * from ma_socios_negocio where id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_socio_negocio(
        $nombre, 
        $razon_social, 
        $direccion, 
        $tipo_socio, 
        $contacto, 
        $email, 
        $estado, 
        $telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT into ma_socios_negocio(nombre, 
        razon_social, 
        direccion, 
        tipo_socio, 
        contacto, 
        email, 
        fecha_creado, 
        estado, 
        telefono) values (?,?,?,?,?,?,curdate(),?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre); 
        $sql->bindValue(2, $razon_social); 
        $sql->bindValue(3, $direccion); 
        $sql->bindValue(4, $tipo_socio); 
        $sql->bindValue(5, $contacto); 
        $sql->bindValue(6, $email);         
        $sql->bindValue(7, $estado); 
        $sql->bindValue(8, $telefono);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_socio_negocio(
        $id,
        $nombre, 
        $razon_social, 
        $direccion, 
        $tipo_socio, 
        $contacto, 
        $email, 
        $estado, 
        $telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_socios_negocio set        
        nombre = ?, 
        razon_social = ?, 
        direccion = ?, 
        tipo_socio = ?, 
        contacto = ?, 
        email = ?,          
        estado = ?, 
        telefono = ?
        where id = ?;";
        $sql=$conectar->prepare($sql);        
        $sql->bindValue(1, $nombre); 
        $sql->bindValue(2, $razon_social); 
        $sql->bindValue(3, $direccion); 
        $sql->bindValue(4, $tipo_socio); 
        $sql->bindValue(5, $contacto); 
        $sql->bindValue(6, $email);         
        $sql->bindValue(7, $estado); 
        $sql->bindValue(8, $telefono);
        $sql->bindValue(9, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_socio_negocio($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE from ma_socios_negocio where id = ?;";
        $sql=$conectar->prepare($sql);                
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }



}
?>
