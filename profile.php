<?php
require_once 'php/conexion.php';

session_start();

$nombre = $_SESSION['user'];
$query = "SELECT * FROM alumno WHERE (usuario = '$nombre');";
$datos = mysqli_query($conexion, $query);
$row = mysqli_fetch_array($datos);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/MaterialIcons.css"/>
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/profile.css"/>
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
            <div class="col s2 z-depth-1 tarjeta">
                <img src="<?php echo $row['imagen']?>">
                <hr>
            </div>
            <div class="col s8 offset-s1">
                
                <div class="contorno" id="informacion-personal">
                    <h4>INFORMACION PERSONAL</h4>
                        
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['nombre']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Nombre</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['apellidos']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Apellido</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['fec_nacimiento']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Fecha de Nacimineto</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['sexo']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Sexo</span></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['legajo']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Legajo</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['dni']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">DNI</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['tel_fijo']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Telefono Fijo</span></label>
                                </div>

                                <div class="input-field col s3">
                                    <input disabled value="<?php echo $row['celular']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Celular</span></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s4">
                                    <input disabled value="<?php echo $row['pais']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Pais</span></label>
                                </div>

                                <div class="input-field col s4">
                                    <input disabled value="<?php echo $row['region']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Region</span></label>
                                </div>

                                <div class="input-field col s4">
                                    <input disabled value="<?php echo $row['ciudad']?>" id="disabled" type="text" class="validate white-text">
                                    <label for="disabled"><span class="form-title">Ciudad</span></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <br>
                
                <div class="contorno" id="postulaciones">
                    <h4>POSTULACIONES</h4>
                     <table class="highlight responsive-table">
                        <thead>
                            <tr>
                                <th class="form-title">Aviso</th>
                                <th class="form-title">Estado</th>
                            </tr>
                        </thead>

                        <tbody>                            
                            <?php
                                global $conexion;
                                $dni = $row['dni'];
                                $query = "SELECT cod_aviso, estado FROM postulaciones_por_alumno WHERE (dni = '$dni');";
                                $sql = mysqli_query($conexion, $query);

                                while($row = mysqli_fetch_array($sql))
                                {
                                    $cod_aviso = $row['cod_aviso'];

                                    $query2 = "SELECT titulo FROM posts WHERE(id = '$cod_aviso');";
                                    $sql2 = mysqli_query($conexion, $query2);
                                    $titulo = mysqli_fetch_array($sql2)['titulo'];
                                ?>

                                    <tr>
                                        <td class="white-text"><?php echo $titulo?></td>
                                        <td>
                                            <?php 
                                                if($row['estado']=='Aceptado')
                                                {?>
                                                    <span class="green-text">Aceptado</span><?php
                                                }
                                                else if($row['estado']=='En Proceso')
                                                {?>
                                                    <span class="yellow-text">En Proceso</span><?php
                                                }
                                                else
                                                {?>
                                                    <span class="red-text">Rechazado</span><?php
                                                }
                                            ?>
                                        </td>
                                    </tr><?php                                        
                                }                                        
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
</body>
</html>