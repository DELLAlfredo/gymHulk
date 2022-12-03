<?php
include "Modelo/Servicios.php";
class ServiciosControlador extends Controller {
    public function guardar(){
    $Servicios = new Servicios();
    $Servicios-> id = $_POST['id'];
    $Servicios-> nombreServicio = $_POST['nombreServicio'];
    $Servicios-> precio = $_POST['precio'];
    $Servicios-> descripcion = $_POST['descripcion'];

        $Servicios -> insert();
        
        
    }
    public function baja(){
        $Servicios = new Servicios();
        $Servicios-> id = $_POST['id'];
  
    
            $Servicios -> delete();
            
            
        }
        public function cambio(){
            $Servicios = new Servicios();
            $Servicios-> id = $_POST['id'];
            $Servicios-> nombreServicio = $_POST['nombreServicio'];
            $Servicios-> precio = $_POST['precio'];
            $Servicios-> descripcion = $_POST['descripcion'];
        
                $Servicios -> update();
                
                
            }
    function render(){
        $this -> view -> Servicios = $this->obtener_todos();
        $this -> view -> lastId = Servicios::getLastId("Servicios");
        $this->view->render('ABCservicios/abcServicios');
    }

    public function obtener_todos(){
        return Servicios::all();
        
    }
}
?>