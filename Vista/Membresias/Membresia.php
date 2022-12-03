<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>Public/css/estilos.css">

</head>


<body>
  <?php require 'Vista/header.php'; ?>
  <form  method="post" action="<?php echo constant('URL'); ?>/Membresia/guardar">
    <h2>MEMBRESIAS</h2>
    <div style="display: flex">
      <div class="Datos" >
        <label>Comprar Membresia: &nbsp; &nbsp; 
        <select name="totalDias">
          <option value="30">30 Dias</option>
          <option value="60" selected>60 Dias</option>
          <option value="365">365 dias</option>
        </select>
        </label>

        <h4>Añadir Usuarios Por Nombre o Telefono</h4>

        <h4>Nombre: &nbsp; <input required name="nombreCliente" type="text" id="texto" cols="30" rows="2"> </h4>
       
        <input type='submit' id='Boton-Pagar' value='PAGAR' style='width:150px; height:30px'>

        <h4>Lista De Membresia Activas De Los Usuario </h4>

      

        <div class="Registro">
          <label>Registrar Nuevo Usuario!!!</label><br><br><br>
          <a self="_blank" class="fcc-btn" href="http://localhost/gymhulk/Empleados">Nuevo Usuario</a> 
          
        </div>
      </div>

    </div>
    <div >
      <table id="tabla">
        <thead>
          <tr>
            <th id="A" scope="col">Usuario</th>
            <th id="A" scope="col">Nombre Servicio</th>
            <th id="A" scope="col">Fecha Inicio</th>
            <th id="A" scope="col">Fecha Fin</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
                foreach ($this->Membresia as $p) {
                   print <<<HTML
                   <tr>
                        <th id="A" scope='row'>$p->nombreCliente</th>
                        <td id="A" >$p->nombreServicio</td>
                        <td id="A" >$p->fechaInicio</td>
                        <td id="A" >$p->fechaFin</td>
                     
                    </tr>  
                   HTML;
                }
                ?>
        </tbody>

      </table>
    </div>


</body>