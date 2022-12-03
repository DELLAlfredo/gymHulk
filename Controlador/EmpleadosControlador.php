<?php
        include "Modelo/Empleados.php";
        class EmpleadosControlador extends Controller{
            public function guardar(){
                $empleados = new Empleados();
                $empleados -> id = $_POST["id"];
                $empleados ->nombre= $_POST['nombre'];
                $empleados ->apPaterno =$_POST['apPaterno'];
                $empleados ->apMaterno=$_POST['apMaterno'];
                $empleados ->sexo=$_POST['sexo'];
                $empleados ->feContratacion =$_POST['feContratacion'];
                $empleados ->telefono =$_POST['telefono'];
             
                $empleados -> insert();
              
            }
            public function editar(){
                $empleados = new Empleados();
                $empleados -> id = $_POST["id"];
                $empleados ->nombre= $_POST['nombre'];
                $empleados ->apPaterno =$_POST['apPaterno'];
                $empleados ->apMaterno=$_POST['apMaterno'];
                $empleados ->sexo=$_POST['sexo'];
                $empleados ->feContratacion =$_POST['feContratacion'];
                $empleados ->telefono =$_POST['telefono'];
             
                $empleados -> update();
              
            }
            function render(){
                $this -> view -> empleados = $this->obtener_todos();
                $this -> view -> lastId = Empleados::getLastId("Empleados");
                $this->view->render('Empleados/ABCEMPLEADOS');
            }
        
        
            public function obtener_todos(){
                return Empleados::all();
                
            }
        }
       
           
?>