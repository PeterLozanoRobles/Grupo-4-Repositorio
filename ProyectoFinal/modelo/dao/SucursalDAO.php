<?php
require_once 'config/Conexion.php';
class SucursalDAO {
    //put your code here
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los productos
        // sql
        $sql = "select * from sucursal ;";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    public function buscar($busq){
          $sql = "SELECT * FROM sucursal where Sector = :b1";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = ['b1' => $busq];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
    
      public function insertar($Provincia, $Ciudad, $Sector, $Direccion, $Personal, $telefono, $Estado) {
        //sentencia sql
        $sql = "INSERT INTO sucursal (Provincia, Ciudad, Sector, Direccion, Personal, telefono, Estado) VALUES  (:Provincia, :Ciudad, :Sector, :Direccion, :Personal, :telefono, :Estado)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Provincia' => $Provincia,
            'Ciudad' => $Ciudad,
            'Sector' => $Sector,
            'Direccion' => $Direccion,
            'Personal' => $Personal,
            'telefono' => $telefono,
            'Estado' => $Estado
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
    
   public function actualizar($Provincia, $Ciudad, $Sector, $Direccion, $Personal, $telefono, $Estado, $id) {
        //prepare
        $sql = "UPDATE `sucursal` SET Provincia= :Provincia, Ciudad=:Ciudad, Sector= :Sector, Direccion= :Direccion, Personal= :Personal, telefono= :telefono, Estado= :Estado WHERE IdSucursal=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Provincia' => $Provincia,
            'Ciudad' => $Ciudad,
            'Sector' => $Sector,
            'Direccion' => $Direccion,
            'Personal' => $Personal,
            'telefono' => $telefono,
            'Estado' => $Estado,
            'id' => $id,
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

    public function eliminar($id) {
        //prepare
        $sql = "delete from sucursal WHERE IdSucursal=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [ 'id' => $id];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
    
      public function buscarxId($id) { // buscar un producto por su id
        $sql = "select * from sucursal where IdSucursal=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $producto;
    }
}
