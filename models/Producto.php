<?php

class Producto extends Conectar{

    public function get_producto(){
        $con=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_producto WHERE est=1";
        $sql=$con->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    
    }
    public function get_producto_x_id($prod_id){
        $con=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_producto WHERE prod_id=?";
        $sql=$con->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    
    }
    public function delete_producto_x_id($prod_id){
        $con=parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_producto
                SET 
                    est=0,
                     fech_elimi=now(),
                     WHERE prod_id=?";
        $sql=$con->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    
    }

    public function insert_producto_x_id($prod_id){
        $con=parent::conexion();
        parent::set_names();
        $sql="INSERT INTO public.tm_producto(
            prod_nom, fech_crea, fech_modi, fech_elimi, est)
            VALUES (?, now(), ?, ?, 1);";
        $sql=$con->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    
    }

    public function update_producto_x_id($prod_id,$prod_nom){
        $con=parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_producto
        SET 
            prod_nom=?,
             fech_modi=now()
             WHERE prod_id=?";
        $sql=$con->prepare($sql);
        $sql->bindValue(1,$prod_nom);
        $sql->bindValue(2,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    
    }
} 

?>