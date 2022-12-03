<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 200px;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .formContainer {
            height: 60%;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php require 'Vista/header.php'; ?>
    <h3 class="p-3">ABC de Productos</h3>
    <div class="formContainer">
        <form class="form" method="POST" action="<?php echo constant('URL'); ?>/Productos/guardar">
            <div class="col d-flex">
                <div class="row gap-3 container-fluid">
                    <div class="form-group row justify-content-evenly">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="ID" min="0" value="<?php echo $this->lastId; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row justify-content-evenly">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="Nombre">
                        </div>
                    </div>
                    <div class="form-group row justify-content-evenly">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="Precio" min="1">
                        </div>
                    </div>
                    <div class="form-group row justify-content-evenly">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" name="Stock" min="1">
                        </div>
                    </div>
                    <div class="form-group row justify-content-evenly">
                        <div class="col-sm-2">Cancelado?</div>
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input type="hidden" name="Cancelado" value="0">
                                <input class="form-check-input" type="checkbox" name="Cancelado" value="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row container-fluid">
                    <div class="form-group row justify-content-evenly">
                        <label for="Descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-5">
                            <textarea name="Descripcion" cols="25" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-evenly">
                        <label for="Descripcion" class="col-sm-2 col-form-label">Opciones:</label>
                        <div class="col-sm-5">
                           <input type="radio" name="opcion" id="alta" checked>
                           <label for="alta">Alta</label><br>
                           <input type="radio" name="opcion" id="baja">
                           <label for="baja">Baja</label><br>
                           <input type="radio" name="opcion" id="cambio">
                           <label for="cambio">Cambio</label><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-evenly pt-5 w-50">
                <button type="submit" class="btn btn-primary w-25" value="guardar">Guardar</button>
                <button type="submit" class="btn btn-primary w-25" value="borrar">Borrar</button>
            </div>
        </form>

    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Cancelado</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->productos as $p) {
                    print <<<HTML
                   <tr>
                        <th scope='row'>$p->id</th>
                        <td>$p->nomProducto</td>
                        <td>$p->precio</td>
                        <td>$p->stock</td>
                        <td>$p->cancelado</td>
                        <td>$p->descripcion</td>
                    </tr>  
                   HTML;
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>