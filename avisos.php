<?php
require_once 'php/conexion.php';
require_once 'mostrar_informacion.php';
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
                <?php
                    global $conexion;

                    switch($_GET['opcion'])
                    {
                        // INSTITUCION
                        case 'uns': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE institucion = 'UNS';"; break;
                        case 'utn': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE institucion = 'UTN';"; break;

                        // AREA
                        case 'administracion': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'administracion';"; break;
                        case 'construccion': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'construccion';"; break;
                        case 'finanzas': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'finanzas';"; break;
                        case 'ingenieria': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'ingenieria';"; break;
                        case 'medicina': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'medicina';"; break;
                        case 'secretaria': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'secretaria';"; break;
                        case 'tecnologia': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'tecnologia';"; break;
                        case 'ventas': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE area = 'ventas';"; break;

                        // JORNADA
                        case 'fulltime': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE jornada = 'full-time';"; break;
                        case 'parttime': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE jornada = 'part-time';"; break;

                        // EMPRESA
                        case 'acasalud': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Aca Salud';"; break;
                        case 'adecco': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Adecco';"; break;
                        case 'autosdelsur': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Autos del Sur';"; break;
                        case 'bairesdev': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'BairesDev';"; break;
                        case 'bbvafrances': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'BBVA Frances';"; break;
                        case 'capitalhumano': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Capital Humano';"; break;
                        case 'chaxxel': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Chaxxel Recursos Humanos';"; break;
                        case 'confidencial': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Confidencial';"; break;
                        case 'ebm': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'EBM Consultores';"; break;
                        case 'edfan': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Edfan';"; break;
                        case 'ett': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'ETT Fastar Argentina';"; break;
                        case 'insigniatalento': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Insignia Talento';"; break;
                        case 'manpower': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Manpower';"; break;
                        case 'neustadt': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Neustadt Fischer';"; break;
                        case 'randstad': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE empresa = 'Randstad';"; break;

                        // NIVEL
                        case 'jefe': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE nivel = 'jefe/supervisor/responsable';"; break;
                        case 'junior': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE nivel = 'junior';"; break;
                        case 'senior': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE nivel = 'senior/semi-senior';"; break;

                        // CONTRATO
                        case 'plazofijo': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE contrato = 'contrato a plazo fijo';"; break;
                        case 'eventual': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE contrato = 'contrato eventual';"; break;
                        case 'otrocontrato': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE contrato = 'otro tipo de contrato';"; break;
                        case 'pasantia': $query = "SELECT COUNT(*) AS cantidad FROM posts WHERE contrato = 'pasantia';"; break;

                        // SALARIO
                        case '10000': $query = "SELECT count(*) as cantidad FROM posts WHERE (salario <= 10000)"; break;
                        case '15000': $query = "SELECT count(*) as cantidad FROM posts WHERE (10000 < salario AND salario <= 15000)"; break;
                        case '20000': $query = "SELECT count(*) as cantidad FROM posts WHERE (15000 < salario AND salario <= 20000)"; break;
                        case '21000': $query = "SELECT count(*) as cantidad FROM posts WHERE (salario > 20000)"; break;
                    }

                    $avisos = mysqli_query($conexion, $query);
                    $nro_posts = mysqli_fetch_array($avisos)['cantidad'];
                    $posts_por_pagina = 10;
                    $nro_paginas = ceil($nro_posts / $posts_por_pagina);
                    
                    $inicio = ($_GET['pagina']-1)*$posts_por_pagina;

                    switch($_GET['opcion'])
                    {
                        // INSTITUCION
                        case 'uns': $query = "SELECT * FROM posts WHERE institucion = 'uns' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'utn': $query = "SELECT * FROM posts WHERE institucion = 'utn' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;

                        // AREA
                        case 'administracion': $query = "SELECT * FROM posts WHERE area = 'administracion' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'construccion': $query = "SELECT * FROM posts WHERE area = 'construccion' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'finanzas': $query = "SELECT * FROM posts WHERE area = 'finanzas' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'ingenieria': $query = "SELECT * FROM posts WHERE area = 'ingenieria' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'medicina': $query = "SELECT * FROM posts WHERE area = 'medicina' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'secretaria': $query = "SELECT * FROM posts WHERE area = 'secretaria' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'tecnologia': $query = "SELECT * FROM posts WHERE area = 'tecnologia' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'ventas': $query = "SELECT * FROM posts WHERE area = 'ventas' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;

                        // JORNADA
                        case 'fulltime': $query = "SELECT * FROM posts WHERE jornada = 'full-time' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'parttime': $query = "SELECT * FROM posts WHERE jornada = 'part-time' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;

                        // EMPRESA
                        case 'acasalud': $query = "SELECT * FROM posts WHERE empresa = 'aca salud' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'adecco': $query = "SELECT * FROM posts WHERE empresa = 'adecco' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'autosdelsur': $query = "SELECT * FROM posts WHERE empresa = 'autos del sur' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'bairesdev': $query = "SELECT * FROM posts WHERE empresa = 'bairesdev' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'bbvafrances': $query = "SELECT * FROM posts WHERE empresa = 'bbva frances' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'capitalhumano': $query = "SELECT * FROM posts WHERE empresa = 'capital humano' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'chaxxel': $query = "SELECT * FROM posts WHERE empresa = 'chaxxel recursos humanos' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'confidencial': $query = "SELECT * FROM posts WHERE empresa = 'confidencial' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'ebm': $query = "SELECT * FROM posts WHERE empresa = 'ebm consultores' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'edfan': $query = "SELECT * FROM posts WHERE empresa = 'edfan' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'ett': $query = "SELECT * FROM posts WHERE empresa = 'ett fastar argentina' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'insigniatalento': $query = "SELECT * FROM posts WHERE empresa = 'insignia talento' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'manpower': $query = "SELECT * FROM posts WHERE empresa = 'manpower' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'neustadt': $query = "SELECT * FROM posts WHERE empresa = 'neustadt fischer' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'randstad': $query = "SELECT * FROM posts WHERE empresa = 'randstad' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        
                        // NIVEL
                        case 'jefe': $query = "SELECT * FROM posts WHERE nivel = 'jefe/supervisor/responsable' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'junior': $query = "SELECT * FROM posts WHERE nivel = 'junior' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'senior': $query = "SELECT * FROM posts WHERE nivel = 'senior/semi-senior' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;

                        // CONTRATO
                        case 'plazofijo': $query = "SELECT * FROM posts WHERE contrato = 'contrato a plazo fijo' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'eventual': $query = "SELECT * FROM posts WHERE contrato = 'contrato eventual' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'otrocontrato': $query = "SELECT * FROM posts WHERE contrato = 'otro tipo de contrato' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case 'pasantia': $query = "SELECT * FROM posts WHERE contrato = 'pasantia' ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;

                        // SALARIO
                        case '10000': $query = "SELECT * FROM posts WHERE (salario <= 10000) ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case '15000': $query = "SELECT * FROM posts WHERE (10000 < salario AND salario <= 15000) ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case '20000': $query = "SELECT * FROM posts WHERE (15000 < salario AND salario <= 20000) ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                        case '21000': $query = "SELECT * FROM posts WHERE (salario > 20000) ORDER BY urgente DESC, fecha DESC LIMIT $inicio,$posts_por_pagina"; break;
                    }
                    
                    $avisos = mysqli_query($conexion, $query);

                    while($row = mysqli_fetch_array($avisos))
                    {
                        $i = new DateTime(date("Y-m-d H:m:s"));
                        $f = new DateTime($row['fecha']);
                                                    
                        $interval = ($i->diff($f))->days;?>

                        <div data-aos="fade-left">
                        <a class="waves-effect waves-light modal-trigger modal-info" href="#modal<?php echo $row['id']?>"><?php
                        
                        if($row['urgente']=="si")
                        {?>
                            <div class="div-urgente"><?php
                        }
                        else
                        {
                            if($interval>0)
                            {?>
                                <div class="div-aviso"><?php
                            }
                            else
                            {?>
                                <div class="div-hoy"><?php
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
                            </div></a>
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

    <ul class="pagination center-align">
        <li class="waves-effect
        <?php
            if($_GET['pagina']<=1)
                echo 'disabled';
            else
                echo '';
        ?>
        ">
            <a href="avisos.php?opcion=<?php echo $_GET['opcion']?>&pagina=<?php echo $_GET['pagina']-1;?>">
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
                "><a href="avisos.php?opcion=<?php echo $_GET['opcion']?>&pagina=<?php echo $i?>"><?php echo $i;?></a></li><?php
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
            <a href="avisos.php?opcion=<?php echo $_GET['opcion']?>&pagina=<?php echo $_GET['pagina']+1;?>"><i class="material-icons">chevron_right</i></a>
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
