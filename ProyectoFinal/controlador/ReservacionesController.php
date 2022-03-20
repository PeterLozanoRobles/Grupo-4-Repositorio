<?php
require_once 'modelo/dao/ReservacionDAO.php';
class ReservacionesController {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new ReservacionDAO();
    }

    public function index() {
        // llamar al modelo, obtener los datos de productos
        $resultados = $this->modelo->listar();
        // llama a la vista para que muestre los datos
        require_once 'vista/reservacion/reservacions.list.php';
    }

    public function buscar() {
        // leer parametros
        $busq = $_POST['busqueda'];
        //comunicarse con el modelo
        $resultados = $this->modelo->buscar($busq);

        // comunicarse con la vista
        require_once 'vista/reservacion/reservacions.list.php';
    }
    
    // metodo que usa DTO Producto
    public function nuevo() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            $IDCliente= $_SESSION['ID_Cliente'];
            $IdServicio=htmlentities($_POST["IdServicio"]);
            Timer::$Hora=htmlentities($_POST["Hora"]);
            DateTime::$Fecha=htmlentities($_POST["Fecha"]);
            $Comentario = htmlentities($_POST['Comentario']);
            $exito = $this->modelo->insertar($Comentario, $Fecha, $Hora, $IDCliente , $IdServicio);
            $msj = 'Reservacion guardado exitosamente';
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
            header('Location:index.php?c=reservaciones&f=index');
        } 
        else {
            require_once 'modelo/dao/CategoriasDAO.php';
            $modeloCat = new CategoriasDAO();
            $categorias = $modeloCat->listarA();
            require_once 'vista/producto/reservacions.nuevo.php';
        }
    }

    public function editar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {// editar
            
            $id = htmlentities($_POST['id']);
            Timer::$Hora=htmlentities($_POST["Hora"]);
            DateTime::$Fecha=htmlentities($_POST["Fecha"]);
            $Comentario = htmlentities($_POST['Comentario']);
            $exito = $this->modelo->actualizar($Comentario, $Fecha, $Hora, $id);
            $msj = 'Reservacion actualizado exitosamente';
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
            header('Location:index.php?c=reservaciones&f=index');        
            
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
            require_once 'vista/reservacion/reservacions.editar.php';
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
        header('Location:index.php?c=reservaciones&f=index'); // redireccionamiento, causa un cambio en la url
    }
}
