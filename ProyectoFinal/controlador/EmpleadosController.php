<?php
require_once 'modelo/dao/EmpleadoDAO.php';

class EmpleadosController {
    //put your code here
    //put your code here
    private $modelo;
    private $vista;
    //
    public function __construct() {
        $this->modelo = new EmpleadoDAO();
    }
    
    //
    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/empleado/empleados.list.php';
    }

    //
    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/empleado/empleados.list.php';
    }

   
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $Cedula=htmlentities($_POST["Cedula"]);
            $Nombre=htmlentities($_POST["Nombre"]);
            $Apellidos=htmlentities($_POST["Apellidos"]);
            DateTime: $Fecha_Nacimiento=htmlentities($_POST["Fecha_Nacimiento"]);
            $Cargo=htmlentities($_POST["Cargo"]);
            $Sueldo=htmlentities($_POST["Sueldo"]);
            $Usuario=htmlentities($_POST["Usuario"]);
            $Contrasena=htmlentities($_POST["Contrasena"]);
            $Pin=htmlentities($_POST["Pin"]);
            
            if (isset($_POST["Sexo"])) {
                if (htmlspecialchars($_POST["Sexo"]) === "1") 
                {
                $Sexo="F";
                } 
                else {
                $Sexo="M";
                }
            }
            
            if (isset($_POST["Estado"])){
                if (htmlentities($_POST["Estado"]) === "1") 
                {
                $Estado="A";
                } 
                else {
                 $Estado="N";
                }
            }
            $exito = $this->modelo->insertar($Cedula, $Nombre, $Apellidos, $Fecha_Nacimiento, $Sexo, $Cargo, $Sueldo, $Usuario, $Contrasena, $Pin, $Estado);
            $msj = 'Empleado guardado exitosamente';
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
            header('Location:index.php?c=empleados&f=index');
        }
        else {
            require_once 'vista/empleado/empleados.nuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {// editar
            $id= htmlentities($_POST["id"]);
            $Cedula=htmlentities($_POST["Cedula"]);
            $Nombre=htmlentities($_POST["Nombre"]);
            $Apellidos=htmlentities($_POST["Apellidos"]);
            DateTime: $Fecha_Nacimiento=htmlentities($_POST["Fecha_Nacimiento"]);
            $Cargo=htmlentities($_POST["Cargo"]);
            $Sueldo=htmlentities($_POST["Sueldo"]);
            $Usuario=htmlentities($_POST["Usuario"]);
            $Contrasena=htmlentities($_POST["Contrasena"]);
            $Pin=htmlentities($_POST["Pin"]);
            
            if (isset($_POST["Sexo"])) {
                if (htmlspecialchars($_POST["Sexo"]) === "1") 
                {
                $Sexo="F";
                } 
                else {
                $Sexo="M";
                }
            }
            
            if (isset($_POST["Estado"])){
                if (htmlentities($_POST["Estado"]) === "1") 
                {
                $Estado="A";
                } 
                else {
                 $Estado="N";
                }
            }
            $exito = $this->modelo->actualizar($Cedula, $Nombre, $Apellidos, $Fecha_Nacimiento, $Sexo, $Cargo, $Sueldo, $Usuario, $Contrasena, $Pin, $Estado, $id);
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
            require_once 'vista/empleado/empleados.editar.php';
        }
    }
    

    //
    public function eliminar() {
        $id = htmlentities($_GET['id']);
        $_SESSION['Clientes'];
        $exito = $this->modelo->eliminar($id);
        $msj = 'Empleado eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location:index.php?c=empleados&f=index'); 
    }
    
    public function loguin() {
        $Cedula = htmlentities($_GET['cedula']);
        $Contrasena = htmlentities($_GET['Pass']);
        $exito = $this->modelo->logueoAdmi($Cedula,$Contrasena);
        $rol= $this->modelo->rol($Cedula);
        $_SESSION['Rol']=$rol;            //Cargo
        $msj = 'Bienvenido Administrador';
        $color = 'primary';
        if (!$exito) {
            $msj = "Acceso denegado";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location:index.php?c=empleados&f=index'); 
    
        }
}
