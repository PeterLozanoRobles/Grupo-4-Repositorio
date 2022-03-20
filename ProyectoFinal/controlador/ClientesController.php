<?php
require_once 'modelo/dao/ClienteDAO.php';

class ClientesController {
    //put your code here
    private $modelo;
    private $vista;
    //
    public function __construct() {
        $this->modelo = new ClienteDAO();
    }
    
    //
    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/Cliente/clientes.list.php';
    }

    //
    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/cliente/clientes.list.php';
    }

   //
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $nombre=htmlentities($_POST["nombre"]);
            $email=isset($_POST["email"]) ? htmlentities($_POST["email"]) : '';
            $pass=htmlentities($_POST["pass"]);
            $passConfirma=htmlentities($_POST["passConfirma"]);
            $telefono=htmlentities($_POST["telefono"]);
            
            if (isset($_POST["sexo"])) {
                if (htmlspecialchars($_POST["sexo"]) === "1") 
                {
                $sexo="F";
                } 
                else {
                $sexo="M";
                }
            }
            
            if (isset($_POST["termino"])){
                if (htmlentities($_POST["termino"]) === "1") 
                {
                $termino="S";
                } 
                else {
                 $termino="N";
                }
            }
            $exito = $this->modelo->insertar($nombre,$email,$sexo,$pass,$passConfirma,$termino,$telefono);
            $msj = 'Cliente guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=clientes&f=index');
        }
        else {
            require_once 'vista/cliente/clientes.nuevo.php';
        }
    }
    //
    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {// editar
            $id= htmlentities($_POST["id"]);
            $nombre=htmlentities($_POST["nombre"]);
            $email=isset($_POST["email"]) ? htmlentities($_POST["email"]) : '';
            $pass=htmlentities($_POST["pass"]);
            $passConfirma=htmlentities($_POST["passConfirma"]);
            $telefono=htmlentities($_POST["telefono"]);
            
            if (isset($_POST["sexo"])) {
                if (htmlspecialchars($_POST["sexo"]) === "1") 
                {
                $sexo="F";
                } 
                else {
                $sexo="M";
                }
            }
            
            if (isset($_POST["termino"])){
                if (htmlentities($_POST["termino"]) === "1") 
                {
                $termino="S";
                } 
                else {
                 $termino="N";
                }
            }
            $exito = $this->modelo->actualizar($nombre,$email,$sexo,$pass,$passConfirma,$termino,$telefono, $id);
            $msj = 'Cliente guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=clientes&f=index');
        }
            
        else 
        {
            $id = $_GET['id'];
            //comunicarse con el modelo
            $prod = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/cliente/clientes.editar.php';
        }
    }
    

    //
    public function eliminar() {
        $id = htmlentities($_GET['id']);
        $_SESSION['Clientes'];
        $exito = $this->modelo->eliminar($id);
        $msj = 'Cliente eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location:index.php?c=clientes&f=index'); 
    }
    
     public function loguin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {// editar
            $Nombre= htmlentities($_POST["Nombre"]);
            $pass=htmlentities($_POST["Pass"]);
            $exito = $this->modelo->loguin($Nombre, $pass);
            if ($exito===false) {
                $msj = "Usuario o contrasena incorrecto";
                $color = "danger";
            }
           else{
               $_SESSION['Rol'] = 'Cliente';
            $msj = 'Bienvenido';
            $color = 'primary';
           }
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //header('Location:index.php?c=clientes&f=index');
        }
        else 
            require_once 'vista/cliente/clientes.loguin.php';
            
    }
}
