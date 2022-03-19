<?php
require_once 'config/Conexion.php';
class EmpleadoDAO {
     private $con;
    // (IdPersonal, Cedula, Nombre, Apellidos, Fecha_Nacimiento, Sexo, Cargo, Sueldo, Usuario, Contrasena, Pin, Estado)
     
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    //
    public function listar(){// listar todos los productos
        // sql
        $sql = "select * from personal ;";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    //
    public function buscar($busq){
        $sql = "SELECT * FROM personal where (Cedula = :b1)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = ['b1' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
    //
    public function insertar( $Cedula, $Nombre, $Apellidos, $Fecha_Nacimiento, $Sexo, $Cargo, $Sueldo, $Usuario, $Contrasena, $Pin, $Estado) {
        //sentencia sql
        $sql = "INSERT INTO personal ( Cedula, Nombre, Apellidos, Fecha_Nacimiento, Sexo, Cargo, Sueldo, Usuario, Contrasena, Pin, Estado) VALUES 
            (:Cedula, :Nombre, :Apellidos, :Fecha_Nacimiento, :Sexo, :Cargo, :Sueldo, :Usuario, :Contrasena, :Pin, :Estado)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Cedula'=>  $Cedula,
            'Nombre'=>$Nombre,
            'Apellidos'=> $Apellidos,
            'Fecha_Nacimiento'=> $Fecha_Nacimiento,
            'Sexo'=> $Sexo,
            'Cargo'=> $Cargo,
            'Sueldo'=>$Sueldo,
             'Usuario'=> $Usuario,
            'Contrasena'=> $Contrasena,
            'Pin'=> $Pin,
            'Estado'=> $Estado
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
    //
    public function actualizar($Cedula, $Nombre, $Apellidos, $Fecha_Nacimiento, $Sexo, $Cargo, $Sueldo, $Usuario, $Contrasena, $Pin, $Estado, $id) {
        //prepare
        $sql = "UPDATE `personal` SET Cedula= :Cedula, Nombre= :Nombre, Apellidos= :Apellidos, Fecha_Nacimiento= :Fecha_Nacimiento, Sexo= :Sexo, Cargo= :Cargo, "
                . "Sueldo= :Sueldo, Usuario= :Usuario, Contrasena= :Contrasena, Pin= :Pin, Estado= :Estado WHERE IdPersonal=:id";
        
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Cedula'=>  $Cedula,
            'Nombre'=>$Nombre,
            'Apellidos'=> $Apellidos,
            'Fecha_Nacimiento'=> $Fecha_Nacimiento,
            'Sexo'=> $Sexo,
            'Cargo'=> $Cargo,
            'Sueldo'=>$Sueldo,
             'Usuario'=> $Usuario,
            'Contrasena'=> $Contrasena,
            'Pin'=> $Pin,
            'Estado'=> $Estado,
             'id' => $id 
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
    //
    public function eliminar($id) {
        //prepare
        $sql = "DELETE FROM `personal` WHERE `IdPersonal` = :id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [ 'id' => $id ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
       //
      public function buscarxId($id) { // buscar un producto por su id
        $sql = "select * from personal where IdPersonal=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $cliente;
    }
}
