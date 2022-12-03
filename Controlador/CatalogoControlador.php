<?php
include "Modelo/Productos.php";
class CatalogoControlador extends Controller{

   
    public function guardar(){
        $producto = new Productos();
        $producto -> id = $_POST["ID"];
        $producto -> nomProducto = $_POST["Nombre"];
        $producto -> precio = $_POST["Precio"];
        $producto -> stock = $_POST["Stock"];
        $producto -> descripcion = $_POST["Descripcion"];
                
        $producto -> cancelado == "0" ? false : true;
        Productos::all();
        
    }
    function render(){
        $this -> view -> productos = Productos::all();
        $this->view->render('catalogo/catalogo');
    }

    public function obtener_todos(){
        return Productos::all();
        
    }
}
?>
