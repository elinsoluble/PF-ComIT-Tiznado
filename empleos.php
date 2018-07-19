<?php
require_once 'php/conexion.php';
require_once 'mostrar_informacion.php';

if(!$_GET)
{
    header('Location:empleos.php?pagina=1');
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
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/simplePagination.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/aos.css">
</head>
<body>
    <nav class="transparent">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="./index.php">Inicio</a></li>
            <li><a href="./empleos.php">Empleos</a></li>
            <li><a href="./profile.php">Perfil</a></li>
            <li><a href="php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
                <div class="col s2">
                <div id="sticker">
                    <ul class="collapsible z-depth-1">
                        <li>
                            <div class="collapsible-header"><h5>Institucion</h5></div>
                                <?php institucion();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Area</h5></div>
                                <?php areas();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Jornada</h5></div>
                                <?php jornada();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Empresa</h5></div>
                                <?php empresas();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Nivel</h5></div>
                                <?php nivel();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Contrato</h5></div>
                                <?php contratos();?>
                        </li>
                        <li>
                            <div class="collapsible-header"><h5>Salario</h5></div>
                                <?php salario();?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col s10" id=avisos>
            <div class="scrollme">
                <?php
                    global $conexion;

                    $query = "SELECT COUNT(*) AS cantidad FROM posts;";
                    $avisos = mysqli_query($conexion, $query);
                
                    $nro_posts = mysqli_fetch_array($avisos)['cantidad'];
                    $posts_por_pagina = 10;
                    $nro_paginas = ceil($nro_posts / $posts_por_pagina);
                
                    $inicio = ($_GET['pagina']-1)*$posts_por_pagina;
                    $query = "SELECT * FROM posts ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina";
                    $avisos = mysqli_query($conexion, $query);

                    while($row = mysqli_fetch_array($avisos))
                    {
                        $i = new DateTime(date("Y-m-d H:m:s"));
                        $f = new DateTime($row['fecha']);

                        $interval = ($i->diff($f))->days;?>

                        <div data-aos="fade-left">
                        <a class="waves-effect waves-light modal-trigger modal-info" href="#modal<?php echo $row['id']?>">
                        <?php
                        if($row['urgente']=="si")
                        {?>
                            <div class="div-urgente"><?php
                        }
                        else
                        {
                            if($interval>0)
                            {?>
                                <div class="div-aviso" data-aos="fade-left"><?php
                            }
                            else
                            {?>
                                <div class="div-hoy" data-aos="fade-left"><?php
                            }
                        }?>
                            
                            <div class="fecha">
                                <div class="col s6">
                                    <?php
                                        if($row['urgente']=='si')
                                        {?>
                                            <div class="txt-urgente">URGENTE</div><?php
                                        }
                                    ?>
                                </div>
                
                                <div class="col s6 right-align">
                                    <?php
                                        if($interval==0)
                                        {?>
                                            <p>Hoy</p><?php
                                        }
                                        else if($interval==1)
                                        {?>
                                            <p>Hace <?php echo $interval?> Dia</p><?php
                                        }
                                        else
                                        {?>
                                            <p>Hace <?php echo $interval?> Dias</p><?php
                                        }
                                    ?>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="row">
                                    <div class="col s10">
                                        <div class="txt-titulo">
                                            <h5><b><?php echo $row['titulo'];?>
                                            - <?php echo $row['empresa'];?></b></h5>
                                        </div>
                
                                    <div class="txt-descripcion truncate">
                                        <?php echo $row['descripcion'];?>
                                    </div>
                                </div>
                
                                <div class="col s2 imagen">
                                    <?php echo '<img src="'.$row['imagen'].'">';?>
                                </div>
                            </div>
                
                        </a></div>

                    </div>
                    <div id="modal<?php echo $row['id']?>" class="modal">
                        <div class="modal-content">
                            <h4><?php echo $row['titulo'];?> - <?php echo $row['empresa']?></h4>
                            <p><?php echo $row['descripcion']?></p>
                            <p><span class="p_info">Salario:</span> $<?php echo $row['salario']?></p>
                            <p><span class="p_info">Contrato:</span> <?php echo $row['contrato']?></p>
                            <p><span class="p_info">Nivel:</span> <?php echo $row['nivel']?></p>
                            <p><span class="p_info">Jornada:</span> <?php echo $row['jornada']?></p>
                        </div>
                        <div class="modal-footer">
                            <form method='POST' action='postular.php'>
                                <input type="hidden" name="id_aviso" id='id_aviso' value='<?php echo $row['id']?>'></input>
                                    <?php                      
                                        session_start();                  
                                        $nombre = $_SESSION['user'];
                                        $query = "SELECT dni FROM alumno WHERE (usuario = '$nombre');";
                                        $sql = mysqli_query($conexion, $query);
                                        $dni = mysqli_fetch_array($sql)['dni'];
                                        $id_aviso = $row['id'];
                                        
                                        $query = "SELECT COUNT(*) AS cant FROM postulaciones_por_alumno WHERE (dni = '$dni' AND cod_aviso = '$id_aviso');";
                                        $sql = mysqli_query($conexion, $query);
                                        $datos = mysqli_fetch_array($sql)['cant'];
                                        
                                        if($datos==0)
                                        {?>
                                            <button class="btn waves-effect waves-light" type="submit" name="action">POSTULAR<?php
                                        }
                                        else
                                        {?>
                                            <button class="btn waves-effect waves-light disabled" type="submit" name="action">POSTULAR<?php
                                        }
                                    ?>                                
                                    <i class="material-icons right">send</i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <br><?php
                    }
                ?>
                </div>
            </div>
        </div>        
    </div>

    <ul class="pagination center-align">
        <li class="waves-effect
        <?php
            if($_GET['pagina']<=1)
                echo 'disabled';
            else
                echo '';
        ?>
        ">
            <a href="empleos.php?pagina=<?php echo $_GET['pagina']-1;?>">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>

        <?php
            global $nro_paginas;

            for($i=1; $i<= $nro_paginas; $i++)
            {?>
                <li class="waves-effect 
                <?php 
                    if($_GET['pagina'] == $i)
                        echo 'active';
                    else
                        echo '';
                ?>
                "><a href="empleos.php?pagina=<?php echo $i?>"><?php echo $i;?></a></li><?php
            }
        ?>        

        <li class="waves-effect
        <?php
            if($_GET['pagina'] >= $nro_paginas)
                echo 'disabled';
            else
                echo '';
        ?>
        ">
            <a href="empleos.php?pagina=<?php echo $_GET['pagina']+1;?>"><i class="material-icons">chevron_right</i></a>
        </li>
    </ul>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>
    <script src="js/materialize.min.js"></script>
    
    <script src="js/sweetalert2.all.min.js"></script>
    
    <script src="js/jquery.sticky.js"></script>

    <script src="js/aos.js"></script>

    <script src="js/empleos.js"></script>
</body>
</html>
