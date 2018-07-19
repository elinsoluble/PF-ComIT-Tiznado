<?php
require_once 'conexion.php';
require_once 'mostrar_informacion.php';

$opcion = $_GET['opcion'];
echo 'hola';
switch($opcion)
{
    case 'UNS'; $query = "SELECT * FROM posts WHERE institucion = UNS ORDER BY fecha DES;";break;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empleos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="css/MaterialIcons.css"/>
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/empleos.css">
</head>
<body>
    <nav class="transparent">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="./empleos.php">Empleos</a></li>
            <li><a href="./profile.html">Perfil</a></li>
            <li><a href="php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s2">
                <div class="div-institucion">
                    <h5>Institucion</h5>
                    <?php institucion();?>
                </div>
                <br>
                <div class="div-area">
                    <h5>Area</h5>
                    <?php areas();?>
                </div>
                <br>
                <div class="div-jornada">
                    <h5>Tipo</h5>
                    <?php jornada();?>
                </div>
                <br>
                <div class="div-empresa">
                    <h5>Empresa</h5>
                    <?php empresas();?>
                </div>
                <br>
                <div class="div-nivel">
                    <h5>Nivel</h5>
                    <?php nivel();?>
                </div>
                <br>
                <div class="div-contrato">
                    <h5>Tipo de Contrato</h5>
                    <?php contratos();?>
                </div>
                <br>
                <div class="div-salario">
                    <h5>Salario</h5>
                    <a>Menos de $10.000</a><br>
                    <a>$10.000 - $15.000</a><br>
                    <a>$15.000 - $20.000</a><br>
                    <a>Mas de $20.000</a>
                </div>
            </div>

            <div class="col s10" id=avisos>
                <?php
                function avisos()
                {
                    global $conexion, $query;
                
                    $avisos = mysqli_query($conexion, $query);
                
                    while($row = mysqli_fetch_array($avisos))
                    {?>
                        <div class="div-aviso">
                            <div class="fecha">
                                <p class="right-align">
                                    <?php
                                        $i = new DateTime(date("Y-m-d H:m:s"));
                                        $f = new DateTime($row['fecha']);
                                                    
                                        $interval = ($i->diff($f))->days;
                                    
                                        if($interval==0)
                                            echo "Hoy";
                                        else
                                            echo "Hace " . $interval." Dias";
                                    ?>
                                </p>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col s10">
                                    <div class="txt-titulo">
                                        <h5><b><?php echo $row['titulo'];?></b></h5>
                                    </div>
                                                    
                                    <div class="txt-empresa">
                                        <h6><b><?php echo $row['empresa'];?></b></h6>
                                    </div>
                                
                                    <div class="txt-descripcion">
                                        <?php echo $row['descripcion'];?>
                                    </div>
                                </div>
                                
                                <div class="col s2 imagen">
                                    <?php echo '<img src="'.$row['imagen'].'">';?>
                                </div>
                            </div>
                        </div>
                        <br><?php
                    }
                }
                ?>
            </div>
        </div>        
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/empleos.js"></script>
</body>
</html>
