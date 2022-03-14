<?php

class FrontController {
    
public function ruteo(){
    require_once 'config/config.php';

    $controlador = (!empty($_REQUEST['c']))?htmlentities($_REQUEST['c']):CONTROLADOR_PRINCIPAL;
    $controlador = ucwords(strtolower($controlador))."Controller";

    $funcion = (!empty($_REQUEST['f']))?htmlentities($_REQUEST['f']):FUNCION_PRINCIPAL;

    require_once './controlador/'.$controlador.'.php';
    $controlador = new $controlador();
    $controlador->$funcion();

}


}
