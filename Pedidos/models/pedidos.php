<?php
    class  Pedidos extends Conectar{
        public function get_pedidos(){
            $conectar=parent::conexion();
            $sql=" SELECT * FROM ma_pedidos where ESTADO=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_pedido($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT* FROM ma_pedidos where ESTADO=1 AND ID= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql-> execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insertar_pedidos($socio,$fechapedido,$detalle,$subtotal,$isv,$total,$fechaentrega){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_pedidos(ID,ID_SOCIO,FECHA_PEDIDO,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_ENTREGA,ESTADO)
             VALUES (NULL,?,?,?,?,?,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,  $socio);
            $sql->bindValue(2, $fechapedido);
            $sql->bindValue(3, $detalle);
            $sql->bindValue(4, $subtotal);
            $sql->bindValue(5, $isv);
            $sql->bindValue(6, $total);
            $sql->bindValue(7, $fechaentrega);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_pedidos($id){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_pedidos where ID= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql-> execute();
            return $resultado=$sql->fetchAll(PDO:: FETCH_ASSOC);
        }
    
    public function Update_pedidos($id,$socio,$fechapedido,$detalle,$subtotal,$isv,$total,$fechaentrega,$estado){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_pedidos SET ID_SOCIO=?,FECHA_PEDIDO=?,DETALLE=?,SUB_TOTAL=?,TOTAL_ISV=?,TOTAL=?,FECHA_ENTREGA=?,ESTADO=? WHERE ID=?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$socio);
        $sql->bindValue(2,$fechapedido);
        $sql->bindValue(3,$detalle);
        $sql->bindValue(4,$subtotal);
        $sql->bindValue(5,$isv);
        $sql->bindValue(6,$total);
        $sql->bindValue(7,$fechaentrega);
        $sql->bindValue(8,$estado);
        $sql->bindValue(9, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

        }
        ?>

