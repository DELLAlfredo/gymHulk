<?php
include "Modelo/Productos.php";
class ProductosControlador extends Controller{

   
    public function guardar(){
        $producto = new Productos();
        $producto -> id = $_POST["ID"];
        $producto -> nomProducto = $_POST["Nombre"];
        $producto -> precio = $_POST["Precio"];
        $producto -> stock = $_POST["Stock"];
        $producto -> descripcion = $_POST["Descripcion"];
                
        $producto -> cancelado == "0" ? false : true;
        $producto -> insert();
        
        
    }
    function render(){
        $this -> view -> productos = $this->obtener_todos();
        $this -> view -> lastId = Productos::getLastId("Productos");
        $this->view->render('productos/index');
    }

    public function obtener_todos(){
        return Productos::all();
        
    }
}
?>
