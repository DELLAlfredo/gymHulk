<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container1 {
            width: 100%;
            height: auto;
            background-color: azure;
            border: 1px solid black;
            display: flex;
            margin-top: 0px;
        }

        .Titulo {
            text-align: center;
            height: 50px;
            background-color: red;
        }

        .productos {
            background-color: beige;
            width: 75%;
            border: 1px solid;
            padding-top: 10px;
            height: auto;
        }

        .carrito {
            margin-bottom: 0px;
            width: 25%;
            height: auto;
            background-color: wheat;
            border: 1px solid black;
            display: inline-block;
        }

        .img {
            width: 50px;
            height: 50px;
            margin-left: 90%;
            position: absolute;
            margin-top :1%;
        }

        .Title {
            display: inline-block;
            width: 100%;
            margin-top: 0%;
            background-color: aliceblue;
        }

        #c {
            width: 20px;
            height: 20px;
            margin-left: 93%;
            position: relative;
            margin-top: 0%;
        }

        .botones {
            width: 20px;
            height: 20px;
            margin-left: 80%;
            position: relative;
            margin-top: -2%;
            display: flex;
        }

        .producto {
            border: 1px solid;
            width: 150px;
            height: 150px;
            margin-left: 4%;
            display: inline-block;
            background-color: white;
            text-align: center;
            margin-top:  10px ;
        }

        .img2 {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <?php require 'Vista/header.php'; ?>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREfxPARDHcPJI9EUVjBhBWDpIAwEKhqZIszw&usqp=CAU"
            class="img">
        <input type="text" name="" id="c">
    <div class="Title">
        <H1>
            <p class="Titulo">CATALOGO PRODUCTOS </p>
        </H1>
        
    </div>
    <div class="botones">
        <input type="submit" value="Vaciar">&nbsp;&nbsp;
        <input type="submit" value="AGREGA AL CARRITO">
    </div>
    <div class="container1">
        <div class="productos">
            <?php
                foreach ($this->productos as $p) {
                    print <<<HTML
                   <div class="producto">
                        <img src="data:image/jpeg;base64,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" class="img2">
                        <br><label for="">$p->nomProducto</label><br>
                        <label for="">$$p->precio</label><br>
                        <label for="">$p->stock</label><br>
                        <input type="submit" value="+">
                    </div>
                   HTML;
                }
                ?>
        </div>
        <div class="carrito">
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
        
    </div>

    <div class="cale">
        <img src="" alt="">
    </div>
</body>

</html>