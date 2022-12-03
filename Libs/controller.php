<?php

class Controller{
    public $view;
    function __construct(){
        //echo "<p>Controlador base</p>";
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'Modelo/'.$model;

        if(file_exists($url)){
            require $url;

            $modelName = $model;
            $this->model = new $modelName();
        }
    }
}

?>