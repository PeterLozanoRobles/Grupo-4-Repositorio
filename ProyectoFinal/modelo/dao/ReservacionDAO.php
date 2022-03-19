//reservar    Comentario, Fecha, Hora (time),IDCliente (int),IdReserva (PRI, int),IdServicio (int)

<?php
require_once 'config/Conexion.php';
require_once 'modelo/dto/ReservacionDAO.php';
class ReservacionDAO {
    //put your code here
    private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    public function listar(){// listar todos los productos
        // sql
       $sql = "select r.IdReserva,c.Nombre as 'Nombre del cliente', p.Nombre as 'Servicio', r.Fecha, r.Hora, "
                . "r.Comentario from reservar r , cliente c , productos p "
                . "WHERE r.IdProductos=p.IdProductos and r.IDCliente= c.IdUsuario ;";
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
          $sql = "SELECT * FROM reservar where IdReserva = :b1;";
        $stmt = $this->con->prepare($sql);
        // preparar la sentencia
        $data = ['b1' => $conlike];
        // ejecutar la sentencia
        $stmt->execute($data);
        //obtener y retornar resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;      
    }
    
   public function insertar($Comentario, $Fecha, $Hora, $IDCliente , $IdServicio) {
        //sentencia sql
        $sql = "INSERT INTO reservar (Comentario, Fecha, Hora, IDCliente, IdServicio) VALUES 
            (Comentario, Fecha, Hora, IDCliente, IdServicio)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'IDCliente' => $IDCliente,
            'IdServicio' => $IdServicio,
            'Fecha' => $Fecha,
            'Hora' => $Hora,
            'Comentario' => $Comentario
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
   public function actualizar($Comentario, $Fecha, $Hora , $id) {
        //prepare
        $sql = "UPDATE `reservar` SET Comentario=:Comentario, Fecha= :Fecha, Hora= :Hora WHERE IdReserva=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'IdServicio' => $IdServicio,
            'Fecha' => $Fecha,
            'Hora' => $Hora,
            'Comentario' => $Comentario,
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
        $sql = "delete from reservar WHERE IdReserva =:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
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
        $sql = "select r.IdReserva, c.Nombre as 'Nombre del cliente', p.Nombre as 'Servicio', r.Fecha, r.Hora, "
                . "r.Comentario from reservar r , cliente c , productos p "
                . "WHERE r.IdProductos=p.IdProductos and r.IDCliente= c.IdUsuario and r.IdReserva= :id";
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
