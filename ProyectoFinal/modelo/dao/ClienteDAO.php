<?php
require_once 'config/Conexion.php';

class ClienteDAO {
    //put your code here
     private $con;
    
    public function __construct() {
        $this->con = Conexion::getConexion();
    }
    
    //
    public function listar(){// listar todos los productos
        // sql
        $sql = "select * from cliente ;";
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
        $sql = "SELECT * FROM cliente where (Nombre like :b1)";
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
    
    //
    public function insertar($nombre,$email,$sexo,$pass,$passConfirma,$termino,$telefono) {
        //sentencia sql
        $sql = "INSERT INTO cliente ( Nombre, Password, Confpassword, Email, Sexo, Telefono, Termino) VALUES 
            (:Nombre, :Password, :Confpassword, :Email, :Sexo, :Telefono, :Termino)";
       
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'Nombre'=>  $nombre,
            'Password'=>$pass,
            'Confpassword'=> $passConfirma,
            'Email'=> $email,
            'Sexo'=> $sexo,
            'Telefono'=> $telefono,
            'Termino'=>$termino
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
    public function actualizar($nombre,$email,$sexo,$pass,$passConfirma,$termino,$telefono, $id) {
        //prepare
        $sql = "UPDATE `cliente` SET `Nombre`=:Nombre, `Password`= :Password, `Confpassword`= :Confpassword, "
                . "`Email`= :Email, `Sexo`= :Sexo, `Telefono`= :Telefono, `Termino`=:Termino WHERE IdUsuario=:id";
        
        $sentencia = $this->con->prepare($sql);
        $data = [
            'id' => $id,
            'Nombre'=> $nombre ,
            'Password'=>$pass,
            'Confpassword'=> $passConfirma,
            'Email'=> $email,
            'Sexo'=>$sexo,
            'Telefono'=> $telefono,
            'Termino'=> $termino
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
        $sql = "DELETE FROM `cliente` WHERE `IdUsuario` = :id";
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
        $sql = "select * from cliente where IdUsuario=:id";
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
    
     public function loguin($Nombre, $pass) { // buscar un producto por su id
        $sql = "select count(Nombre) from cliente where Nombre=:Nombre and Password= :Password";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = [
            'Nombre' => $Nombre,
            'Password' => $pass];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        if ($stmt=== 0) {// verificar si se inserto 
            //rowCount permite obtner el numero de filas afectadas
            return false;
        }
        return true;
    }
}
