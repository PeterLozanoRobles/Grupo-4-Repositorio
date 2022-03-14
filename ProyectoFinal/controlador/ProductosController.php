<?php

require_once 'modelo/dao/ProductoDAO.php';
require_once 'modelo/dao/CategoriasDAO.php';

class ProductosController {

    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new ProductoDAO();
    }

    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/producto/productos.list.php';
    }

    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/producto/productos.list.php';
    }
    
    // metodo que usa DTO Producto
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $nombre=htmlentities($_POST["Nombre"]);
            $descripcion=htmlentities($_POST["Descripcion"]);
            $precio=htmlentities($_POST["Precio"]);
            $idCat = htmlentities($_POST['Categoria']);
            
            if(isset($_POST["Estado"])=='1'){
                $Estado ='A'; 
            }
            else{
                $Estado ='N'; 
            }
            //$_SESSION['usuario'];
            //comunicarme con el modelo
             
            $exito = $this->modelo->insertar($nombre, $descripcion, $Estado,$idCat,$precio);
            $msj = 'Producto guardado exitosamente';
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
            header('Location:index.php?c=Productos&f=index');
        } 
        else {
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listarA();
            require_once 'vista/producto/productos.nuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {// editar
            // leer los parametros del formulario
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $id = htmlentities($_POST['id']);
            $nombre=htmlentities($_POST["Nombre"]);
            $descripcion=htmlentities($_POST["Descripcion"]);
            $precio=htmlentities($_POST["Precio"]);
            $idCat = htmlentities($_POST['Categoria']);
            
            if(isset($_POST["Estado"])=='1'){
                $Estado ='A'; 
            }
            else{
                $Estado ='N'; 
            }
            $exito = $this->modelo->actualizar($nombre, $descripcion, $Estado,$idCat,$precio,$id);
            $msj = 'Producto actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            //   $this->index();
            header('Location:index.php?c=Productos&f=index');        
            
        } 
        else {//mostrar el formulario de edicion cuando la solicitud es por get
            //comunicarse con el modelo
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listarA();

            // leer parametros
            $id = $_GET['id'];
            //comunicarse con el modelo
            $prod = $this->modelo->buscarxId($id);

            // comunicarse con la vista
            require_once 'vista/producto/productos.editar.php';
        }
    }

    public function eliminar() {
        // leer parametros
        $id = htmlentities($_GET['id']);
        //$usu = 'usuario'; //$_SESSION['usuario'];
        //llamar al modelo
        $exito = $this->modelo->eliminar($id);
        $msj = 'Producto eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        session_start();
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;

        //llamar a la vista
        // $this->index();
        //llamar a la vista
        header('Location:index.php?c=productos&f=index'); // redireccionamiento, causa un cambio en la url
    }

}
