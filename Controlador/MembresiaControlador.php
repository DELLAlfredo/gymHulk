<?php
include "Modelo/Membresia.php";
class MembresiaControlador extends Controller {
    public function guardar(){
    $Membresias = new Membresia();
    $Membresias ->nombreCliente = $_POST["nombreCliente"];
    $Membresias -> fechaInicio = new DateTime();
    $dias = $_POST["totalDias"];
    $Membresias -> nombreServicio = $dias;
    $Membresias -> fechaFin = new DateTime();
    date_add($Membresias -> fechaFin,new DateInterval("P{$dias}D"));
    $Membresias -> DiasRestantes = $Membresias ->fechaInicio->diff($Membresias->fechaFin)->days;
    $Membresias -> fechaInicio = $Membresias -> fechaInicio ->format("Y-m-d");
    $Membresias -> fechaFin = $Membresias -> fechaFin ->format("Y-m-d");
  
    

        $Membresias -> insert();
        
        
    }
    function render(){
        $this -> view -> Membresia = $this->obtener_todos();
        $this->view->render('Membresias/Membresia');
    }

    public function obtener_todos(){
        return Membresia::all();
        
    }
   
}
?>