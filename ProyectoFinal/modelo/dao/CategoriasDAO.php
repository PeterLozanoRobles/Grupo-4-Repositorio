<?php
require_once 'config/Conexion.php';

class CategoriasDAO {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar() {
        $sql = "select * from categoria ;";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    public function listarA() {
        $sql = "select Nombre, Id_categoria from categoria where Estado= 'A' ;";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    public function buscar($busq){
        $sql = "SELECT * FROM categoria where (Nombre like :b1)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $busq . '%';
        $data = ['b1' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
      public function insertar($Nombre, $Descripcion, $Estado) {
        //sentencia sql
        $sql = "INSERT INTO categoria (Nombre, Descripcion, Estado) VALUES (:Nombre, :Descripcion, :Estado)";
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Nombre' => $Nombre,
            'Descripcion' => $Descripcion,
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
     
   public function actualizar($Nombre, $Descripcion, $Estado, $id) {
        //prepare
        $sql = "UPDATE `categoria` SET Nombre= :Nombre, Descripcion= :Descripcion, Estado= :Estado WHERE Id_categoria =:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Nombre' => $Nombre,
            'Descripcion' => $Descripcion,
            'Estado' => $Estado,
            'id'=>$id
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
        $sql = "DELETE FROM `categoria`  WHERE Id_categoria=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = ['id' => $id];
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
        $sql = "select * from categoria where Id_categoria=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $categoria = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $categoria;
    }
}
