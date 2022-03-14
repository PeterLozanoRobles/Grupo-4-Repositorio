<?php
require_once 'modelo/dao/CategoriasDAO.php';

class CategoriasController{
    //put your code here
    private $modelo;
    private $vista;
    //
    public function __construct() {
        $this->modelo = new CategoriasDAO();
    }
    
    //
    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/categoria/categorias.list.php';
    }

    //
    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/categoria/categorias.list.php';
    }

   //
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $Nombre=htmlentities($_POST["Nombre"]);
            $Descripcion=htmlentities($_POST["Descripcion"]);
            if($_POST["Estado"]=="1"){
                $Estado='A';
            }      
            else{
                $Estado='N';
            }
                
            $exito = $this->modelo->insertar($Nombre,$Descripcion, $Estado);
            $msj = 'categoria guardado exitosamente';
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
            header('Location:index.php?c=categorias&f=index');
        }
        else {
            require_once 'vista/categoria/categorias.nuevo.php';
        }
    }
    //
    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {// edita
            $Nombre=htmlentities($_POST["Nombre"]);
            $id= htmlentities($_POST["id"]);
            $Descripcion=htmlentities($_POST["Descripcion"]);
            $Estado=htmlentities($_POST["Estado"]);          
            $exito = $this->modelo->actualizar($Nombre,$Descripcion, $Estado, $id);
            $msj = 'Catalogo guardado exitosamente';
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
            header('Location:index.php?c=categorias&f=index');
        }
            
        else 
        {
            $id = $_GET['id'];
            //comunicarse con el modelo
            $prod = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/categoria/categorias.editar.php';
        }
    }
    

    //
    public function eliminar() {
        $id = htmlentities($_GET['id']);
        //$_SESSION['Clientes'];
        $exito = $this->modelo->eliminar($id);
        $msj = 'categoria eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        header('Location:index.php?c=categorias&f=index'); 
    }
}


