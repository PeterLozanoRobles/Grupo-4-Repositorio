<?php


class PaginasController {
    public function index() {
    require_once 'vista/home/home.portada.php';    
    
    }
    
    public function nosotros(){
         require_once 'vista/home/home.nosotros.php';
    }
    
   public function portada() {
       require_once 'vista/home/home.portada.php';
   }
}
