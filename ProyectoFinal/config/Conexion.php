<?php 
class Conexion{
    
    public static function getConexion(){
        $database_username = 'root';
        $database_password = 'Falcone.1998';
        $dbname="floreria";
        $dsn = 'mysql:host=localhost;dbname=' . $dbname;
        $conexion = null; 
        try{
            $conexion = new PDO($dsn, $database_username, $database_password ); 
        }catch(Exception $e){
                echo $e;
                die("error " . $e->getMessage());
        }
        return $conexion;
    }
    
    
    
}

