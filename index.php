<!--APARTADO PHP PARA OBTENCION DE DATOS-->
<?php
    if(!file_exists("catalogo.pl")) die("No se puede localizar el archivo .pl, el directorio actual es: ".__DIR__);
        $output = `swipl -s catalogo.pl -g verCatalogo(*). -t halt.`;
        $peliculas = explode("*", $output); 
      error_reporting(0);
    ?>
    <!--FIN DE APARTADO DE DATOS-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />
    <!--Tipografía-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
    body{
        font-family: 'Montserrat';
    }
    .single-blog-img {
        overflow: hidden;
    }

    .single-blog-img a img {
        width: 100%;
        -webkit-transition: .3s;
        -moz-transition: .3s;
        -ms-transition: .3s;
        -o-transition: .3s;
        transition: .3s;
    }

    .single-blog:hover .single-blog-img a img {
        -webkit-transform: scale(1.09);
        -moz-transform: scale(1.09);
        -ms-transform: scale(1.09);
        -o-transform: scale(1.09);
        transform: scale(1.09);
    }

    .single-blog-img img {
        width: 100%;
    }
    </style>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="logo" style="width:70px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size:20px" href="index.php">Inicio</a>
                    </li>

                </ul>
                <form class="d-flex input-group w-auto" id="formCategoria" method="post" action="conexion.php">
                    <select class="form-select form-select-mb mb-3" aria-label=".form-select-lg example" id="selCat" name="selCat">
                    <option hidden>Categoría</option>
                        <option value="accion">Acción</option>
                        <option value="aventura">Aventura</option>
                        <option value="ciencia_ficcion">Ciencia Ficción</option>
                        <option value="comedia">Comedia</option>
                        <option value="fantasia">Fantasia</option>
                        <option value="guerra">Guerra</option>
                        <option value="romance">Romance</option>
                    </select>
                    <button class="btn btn-outline-primary mb-3" type="submit" data-mdb-ripple-color="dark">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <hr>
    <!--FIN NAVBAR-->
    <div class="container">
        <div class="row">
            <div class="col-mb-1"></div>
            <div class="col-mb-10">
                <h2 style="text-align:center"><b>Nuestro Catálogo</b></h2>
                <hr>
            </div>
            <div class="col-mb-1"></div>
        </div>
        <div clas="row">
            <div class="col-mb-1"></div>
            <div class="col-mb-10" style="text-align:center">
                <?php 
                $i=0;
                foreach ($peliculas as $row){
                $ficha = explode("-", $peliculas[$i]); 
                if($ficha[2] == null){
                    break;
                }else{
                ?>
                <div class="media border p-4 mb-2 text-dark" style="background-color:#EEEEEE;  box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.19);">
                    <div style="text-align:center">
                        <div class="single-blog">
                            <div class="single-blog-img">
                                <a href="pelicula.php?id=<?php echo $ficha[0]?>&categoria=<?php echo $ficha[1]?>"><img src="img/<?php echo $ficha[0]?>.jpg" alt="Caratula" style="width:30%" /></a>
                            </div>
                        </div>
                    </div>
                    <div style="text-align:justify">
                        <h4><b><?php echo $ficha[2]?><small><i><br><?php echo $ficha[4]?></i></small></b></h4>
                        <p style="text-align: justify"><b>Sinopsis: </b><?php echo $ficha[3]?></p>
                        <p style="text-align: justify"><b>Duración (mins): </b><?php echo $ficha[5]?></p>
                        <p style="text-align: justify"><b>Idioma: </b><?php echo $ficha[6]?></p>
                        <p style="text-align: justify"><b>Año de estreno: </b><?php echo $ficha[7]?></p>
                        <p style="text-align: justify"><b>Enlace: </b><?php echo $ficha[8]?></p>
                        <p style="text-align: justify"><b>Costo: </b>$<?php echo $ficha[9]?>mxn</p>
                            <?php //print_r($ficha); 
                            $i++?>
                            
                    </div>
                </div>
                <?php 
                }
            }
                ?>
            </div>
            <!--DIV DE COL SM-->
            <div class="col-mb-1"></div>
        </div>
    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>