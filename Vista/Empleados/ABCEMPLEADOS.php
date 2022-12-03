  <!--DISEÑO HTML-->
<!DOCTYPE html>
<html>
    <head>      
        <style>
            body{
                background-color:  azure;
            }
            .CP{
                display: flex;
                position: relative;
            }
            label{
                background-color: aliceblue;
                padding-top: 17px;
                text-align: center black;
                width: 10px;
            }
           .img{
                width: 20%; 
                padding-left: 15%;
           }
           .select{
                width:14.6%;
                height: 30px;
           }
         
           td{
            border: 1px solid black;
           }
           .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
        }
        h1{
            padding-left: 25%;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        </style>
    </head>
    <body>
        <?php require 'Vista/header.php'; ?>
        <form action="ABCEMPLEADOS.php" method="post" action="<?php echo constant('URL'); ?>/Empleados/guardar">
        <h1>ABC EMPLEADOS</h1>
        <!--ID-->
        <div >
            <h3>
                <b ><label  style="margin-left:15% " >ID:</label></b>
                <input class="ID2" name="id" min="0" value="<?php echo $this->lastId; ?>" readonly ></input>
                <label  style="margin-left:15% "> Fecha Contratacion:</label>
                <input class="Contratacion" input type="date"  name="feContratacion"></input>
            </h3>
            <br>
            <!--Nombre-->
            <h3>
                <label  style="margin-left:12.5% ">Nombre:</label>
                <input class="Nom" input type="text"  name="nombre"></input>
                <label  style="margin-left:20.5% ">Telefono:</label>
                <input class="Tel" input type="text"  name="telefono"></input>
                <br><br>
            </h3>
        </div>
            <!--Caja principal -->
            <div  class="CP">
                <!--Caja 1 -->
                <div style="width: 33%">
                <!--Apellido Paterno -->
                <label  style="margin-left:24% "><b>Apellido Paterno:</b></label>
                <input class="ID2" input type="text"  name="apPaterno"> </input>
                <br><br><br>
                <!--Apellido Materno -->
                <label  style="margin-left:23.5% "><b>ApellidoMaterno:</b></label>
                <input class="ID2" input type="text"  name="apMaterno"></input>
                </div>
                <!--Caja 2 -->
                <div class="img" >
                    <img src="C:\xampp\htdocs\GymHulk\Vista\descarga.jpg" name="img" width="150" height="150" >
                </div>
                <!-- Botones de agegar eliminar y Cambio-->
                <!--Caja 3 -->
                <div>
                    <input type="radio" name="opcion" id="alta" checked>
                    <label for="alta">Alta</label><br><br>
                    <input type="radio" name="opcion" id="baja">
                    <label for="baja">Baja</label><br><br>
                    <input type="radio" name="opcion" id="cambio">
                    <label for="cambio">Cambio</label><br><br>
                </div>      
            <br><br><br>
        </div>
         <!-- Sexo-->
        <label  style="margin-left:14% "><b>Sexo:</b></label>
        <select class="select"   name="sexo">
            <option value="Masculino" input type="text" selected>Masculino</option>
            <option value="Femenino" input type="text">Femenino</option>
        </select>
        <input type="button" value="Agregar Foto" style="margin-left: 18%"><br>
         <!-- Boton Guardar-->
        <!--<input type="button" value="Guardar" style="margin-left: 20%">-->
        <br><br><br>
        <input type="submit" value="Guardar" style="margin-left: 18%">
        <input type="reset" value="Borrar" style="margin-left: 10%"> 
        <br>
        </form>
        <br> <br> <br>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered table-striped mb-0">
                <thead >
                    <tr >
                        <th scope="col">ID</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apPaterno</th>
                        <th scope="col">apMaterno</th>
                        <th scope="col">sexo</th>
                        <th scope="col">feContratacion</th>
                        <th scope="col">telefono</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->empleados as $p) {
                    print <<<HTML
                    <tr>
                            <th scope='row'>$p->id</th>
                            <td>$p->nombre</td>
                            <td>$p->apPaterno</td>
                            <td>$p->apMaterno</td>
                            <td>$p->sexo</td>
                            <td>$p->feContratacion</td>
                            <td>$p->telefono</td>
                        </tr>  
                    HTML;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>