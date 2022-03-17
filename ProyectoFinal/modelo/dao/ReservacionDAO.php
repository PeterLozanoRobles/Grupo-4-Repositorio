//reservar    Comentario, Fecha, Hora (time),IDCliente (int),IdReserva (PRI, int),IdServicio (int)

<?php
require_once 'config/Conexion.php';
require_once 'modelo/dto/Producto.php';
class ReservacionDAO {
    //put your code here
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los productos
        // sql
        $sql = "select * from productos p, categoria c where c.Id_categoria=p.IdCategoria and c.Estado= 'A' ;";
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
          $sql = "SELECT * FROM productos, categoria  where prod_idCategoria = cat_id and prod_estado=1  and 
		(prod_nombre like :b1 or cat_nombre =:b2)";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $conlike = '%' . $busq . '%';
        $data = ['b1' => $conlike, 'b2' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
    
      public function insertar($Comentario, $Fecha, $Hora, $IDCliente , $IdReserva, $IdServicio) {
        //sentencia sql
        $sql = "INSERT INTO productos (prod_id, prod_codigo, prod_nombre, prod_descripcion, prod_estado, prod_precio, 
            prod_idCategoria, prod_usuarioActualizacion, prod_fechaActualizacion) VALUES 
            (NULL, :cod, :nom, :desc, :estado, :precio, :idCat, :usu, :fecha)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'cod' => $cod,
            'nom' => $nom,
            'desc' => $desc,
            'estado' => $estado,
            'precio' => $precio,
            'idCat' => $idCat,
            'usu' => $usu,
            'fecha' => $strfecha
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
    
   public function actualizar($Comentario, $Fecha, $Hora, $IDCliente , $IdReserva, $IdServicio, $id) {
        //prepare
        $sql = "UPDATE `productos` SET `prod_codigo`=:cod,`prod_nombre`=:nom,`prod_descripcion`=:desc," .
                "`prod_estado`=:estado,`prod_precio`=:precio,`prod_idCategoria`=:idCat,`prod_usuarioActualizacion`=:usu," .
                "`prod_fechaActualizacion`=:fecha WHERE prod_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'cod' => $cod,
            'nom' => $nom,
            'desc' => $desc,
            'estado' => $estado,
            'precio' => $precio,
            'idCat' => $idCat,
            'usu' => $usu,
            'fecha' => $strfecha,
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

    public function eliminar($id, $usu) {
        //prepare
        $sql = "UPDATE `productos` SET `prod_estado`=0,`prod_usuarioActualizacion`=:usu," .
                "`prod_fechaActualizacion`=:fecha WHERE prod_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $fechaActual = new DateTime('NOW');
        $strfecha = $fechaActual->format('Y-m-d H:i:s');
        $data = [
            'usu' => $usu,
            'fecha' => $strfecha,
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
    
      public function buscarxId($id) { // buscar un producto por su id
        $sql = "select * from productos, categoria where prod_idCategoria = cat_id and prod_estado=1 and prod_id=:id";
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
