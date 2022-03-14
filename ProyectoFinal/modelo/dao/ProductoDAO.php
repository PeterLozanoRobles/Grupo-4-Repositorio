<?php
require_once 'config/Conexion.php';
require_once 'modelo/dao/ProductoDAO.php';
class ProductoDAO {
    // operaciones de acceso y manejo de datos
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los productos
        // sql
        $sql = "select p.IdProductos, p.Nombre, p.Descripcion, c.Nombre as categoria, p.Precio, p.Estado from productos p, categoria c where c.Id_categoria= p.IdCategoria;";
        // preparar la sentencia p, categoria c where c.Id_categoria=p.IdCategoria and c.Estado= 'A'
        $stmt = $this->con->prepare($sql);
        //ejecutar la sentencia
        $stmt->execute();
        // recuperar los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // retornar los resultados al controlador
        return $resultados; 
        
    }
    
    public function buscar($busq){
          $sql = "select p.IdProductos, p.Nombre, p.Descripcion, c.Nombre as categoria, p.Precio, p.Estado from productos p, categoria c where c.Id_categoria= p.IdCategoria and p.Nombre like :b1";
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
    
     // metodo que usa DTO Producto
     public function insertar($nombre, $descripcion, $Estado,$idCat,$precio) {
        //sentencia sql
        $sql = "INSERT INTO productos (Nombre, Descripcion, Estado, Precio, IdCategoria) VALUES (:Nombre, :Descripcion, :Estado, :Precio, :IdCategoria)";
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Nombre' =>  $nombre,
            'Descripcion' =>  $descripcion,
            'Estado' =>   $Estado,
            'Precio' =>  $precio,
            'IdCategoria' =>  $idCat
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
    
   public function actualizar($nombre, $descripcion, $Estado,$idCat,$precio, $id) {
        //prepare
        $sql = "UPDATE `productos` SET Nombre=:Nombre, Descripcion= :Descripcion, Estado= :Estado, Precio= :Precio, IdCategoria=:IdCategoria WHERE IdProductos=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Nombre' =>  $nombre,
            'Descripcion' =>  $descripcion,
            'Estado' =>   $Estado,
            'Precio' =>  $precio,
            'IdCategoria' =>  $idCat,
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

    public function eliminar($id) {
        //prepare
        $sql = "delete from productos where IdProductos= :id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = ['id' => $id ];
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
        $sql = "select p.IdProductos, p.Nombre, p.Descripcion, c.Nombre as categoria, p.Precio, p.Estado from productos p, categoria c where c.Id_categoria= p.IdCategoria and p.IdProductos = :id";
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
