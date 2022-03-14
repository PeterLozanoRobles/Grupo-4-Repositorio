<?php
require_once 'modelo/dao/SucursalDAO.php';
class SucursalController {
    //put your code here
     private $modelo;
    private $vista;
    //
    public function __construct() {
        $this->modelo = new SucursalDAO();
    }
    
    //
    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/sucursal/sucursal.list.php';
    }

    //
    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/sucursal/sucursal.list.php';
    }

   //
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $Provincia=htmlentities($_POST["Provincia"]);
            $Ciudad=htmlentities($_POST["Ciudad"]);
            $Sector=htmlentities($_POST["Sector"]);
            $Direccion=htmlentities($_POST["Direccion"]);
            $Personal=htmlentities($_POST["Personal"]);
            $telefono=htmlentities($_POST["telefono"]);
           if($_POST["Estado"]=='1'){
               $Estado='A';
           }
           else{
               $Estado='N';
           }
           
            $exito = $this->modelo->insertar($Provincia, $Ciudad, $Sector, $Direccion, $Personal, $telefono, $Estado);
            $msj = 'Sucursal guardado exitosamente';
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
            header('Location:index.php?c=sucursal&f=index');
        }
        else {
            require_once 'vista/sucursal/sucursal.nuevo.php';
        }
    }
    //
    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {// editar
            $id= htmlentities($_POST["id"]);
            $Provincia=htmlentities($_POST["Provincia"]);
            $Ciudad=htmlentities($_POST["Ciudad"]);
            $Sector=htmlentities($_POST["Sector"]);
            $Direccion=htmlentities($_POST["Direccion"]);
            $Personal=htmlentities($_POST["Personal"]);
            $telefono=htmlentities($_POST["telefono"]);
             if($_POST["Estado"]=='1'){
               $Estado='A';
           }
           else{
               $Estado='N';
           }
            
            $exito = $this->modelo->actualizar($Provincia, $Ciudad, $Sector, $Direccion, $Personal, $telefono, $Estado, $id);
            $msj = 'Sucursal guardado exitosamente';
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
            header('Location:index.php?c=sucursal&f=index');
        }
            
        else 
        {
            $id = $_GET['id'];
            //comunicarse con el modelo
            $prod = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/sucursal/sucursal.editar.php';
        }
    }
    

    //
    public function eliminar() {
        $id = htmlentities($_GET['id']);
        //$_SESSION['Clientes'];
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
        header('Location:index.php?c=sucursal&f=index'); 
    }
}
