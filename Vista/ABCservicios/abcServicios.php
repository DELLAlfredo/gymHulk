
<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Public/css/estilos.css">

</head>

<body>

<?php require 'Vista/header.php'; ?>
    <form id="formulario" method="post" action="<?php echo constant('URL'); ?>/Servicios/guardar">
   <div id="Form"  style="display: flex">
    <h1>ABC Servicios</h1><br>

     <div id="form1"><h4>ID:  <textarea id="ID" name="id" type="text" cols="30" rows="2"></textarea></h4> 
        <h4>Nombre:  <textarea id="Nombre"name="nombreServicio" type="textarea" cols="30" rows="2"></textarea> </h4>
        <h4>Precio: <textarea id="Precio" name="precio" type="text" cols="30" rows="2"></textarea> </h4>
    
     </div>

        <div id="des">
            <h4>Descripcion: &nbsp; &nbsp;&nbsp;<textarea id="Descripcion" name="descripcion" type="text" cols="20" rows="10"></textarea> </h4>
                         
                     
        </div>
            <div id="imagen">
            <input type="radio" name="opcion" id="alta" onclick="handleClick(this)" checked>
                <label for="alta">Alta</label><br><br>
                <input type="radio" name="opcion" id="baja" onclick="handleClick(this)">
                <label for="baja">Baja</label><br><br>
                <input type="radio" name="opcion" id="cambio" onclick="handleClick(this)">
                <label for="cambio">Cambio</label><br><br>

            </div>
    </div>

    <div id="Botones">
       
        <button type='submit' id="Guardar" name='btnGuardar' value='guardar' style='width:150px; height:30px'>Guardar</button><br><br>
        <button type='submit' id="Borrar" name='btnBorrar' value='borrar' style='width:150px; height:30px'>Borrar</button>
        
    </div>
    <div  id="tabla-items">
    <table style="width:100%;" >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th> 
                    <th scope="col">Precio</th> 
                    <th scope="col">Descripcion</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($this->Servicios as $p) {
                   print <<<HTML
                   <tr>
                        <th scope='row'>$p->id</th>
                        <td>$p->nombreServicio</td>
                        <td>$p->precio</td>
                        <td>$p->descripcion</td>
                    </tr>  
                   HTML;
                }
                ?>
            </tbody>
        </table>
    </div>     
    </form>
    <script src="<?php echo constant("URL");?>Public/js/Servicios/ABC.js "></script>
</body>