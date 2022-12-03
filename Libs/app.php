<?php
require_once 'Controlador/erroresControlador.php';

class App{

    function __construct(){
        //echo "<p>Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        // cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'Controlador/mainControlador.php';
            require_once $archivoController;
            $controller = new MainControlador();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }
        $controladorName = $url[0] . 'Controlador';
        $archivoController = 'Controlador/' . $controladorName.".php";

        if(file_exists($archivoController)){
            require_once $archivoController;

            // inicializar controlador
            $controller = new $controladorName;
            $controller->loadModel($url[0]);
            
            // # elementos del arreglo
            $nparam = sizeof($url);

            if($nparam > 1){
                
                if($nparam > 2){
                    $param = [];
                    for($i = 2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
                $controller->render();
            }else{
                $controller->render();
            }
        }else{
            $controller = new ErroresControlador();
        }
    }
}

?>