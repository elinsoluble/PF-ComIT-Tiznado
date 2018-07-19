<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inicio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Import Google Icon Font-->
        <link type="text/css" href="css/MaterialIcons.css" rel="stylesheet">
        
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        
        <link type="text/css" rel="stylesheet" href="css/main.css"/>
        <link type="text/css" rel="stylesheet" href="css/pill.css"/>
        <link type="text/css" rel="stylesheet" href="css/registro.css"/>
        <link type="text/css" rel="stylesheet" href="css/animsition.min.css"/>
    </head>
    <body>
        <div class="parallax-container">
            <div class="parallax"><img class="responsive-img" src="images/advice-advise-advisor-7096.jpg"></div>
       
            <nav class="transparent z-depth-0">
                <div class="nav-wrapper">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Inicio</a></li>
                    <?php
                        require 'php/isLogin.php';

                        if($estado)
                        {?>
                            <li><a class="waves-effect waves-light modal-trigger" href="empleos.php">Empleos</a></li>
                            <li><a href="./profile.php">Perfil</a></li>
                            <li><a href="php/logout.php">Salir</a></li>
                            </ul><?php
                        }
                        else
                        {?>
                            <li><a class="waves-effect waves-light modal-trigger" href="#ingresar">Ingresar</a></li></ul><?php
                        }?>
                </div>
            </nav>
        </div>

        <div id="ingresar" class="modal">
            <div class="modal-content">
                <div class="login">
                    <h4 class="center"><b>Sign in</b></h4>
                    <form class="container" method="POST" action="login.php">
                        <div class="input-field">
                            <input name="username" id="username" type="text" class="black-text validate">
                            <label for="username">Usuario</label>
                            <span class="helper-text" data-error="Email invalido" data-success=""></span>
                        </div>
                        
                        <div class="input-field">
                            <input name="password" type="password" id="password" class="validate">
                            <label for="password">Contraseña</label>
                        </div>
                        <br><br>
                        <button id="btn-login" class="bttn-pill" type="submit" name="action">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div>
                    <p class="col s4" id="p1">
                        Es un portal social el cual permite conectar a futuros profesionales directamente con sus potenciales 
                        clientes, para el desarrollo de pequeñas tareas , servicios o trabajos definidos de corta o larga 
                        duración.
                    </p>

                    <p class="col s4" id="p2">
                        Nuestra manera de trabajar es simple. Nos centramos en conectar a los empresarios con los mejores 
                        candidatos que están buscando trabajo, ya sea trabajos de fin de semana, prácticas o programas de 
                        graduados.
                    </p>

                    <p class="col s4" id="p3">
                    Nuestra misión consiste en hacer fácil a todas las personas encontrar el mejor empleo posible. Queremos dar 
                    el mejor servicio a profesionales y empresas, haciendo del proceso de selección un procedimiento sencillo, 
                    rápido y funcional para todos los usuarios.
                    </p>
                    </div>
                </div>
            </div>
        </div>
        
        <span id="pin"></span>

        <div class="parallax-container">
            <div class="parallax"><img class="responsive-img" src="images/adult-agreement-business-1089549.jpg"></div>
        </div>

        <!--CAROUSEL-->
        <div class="section">
            <div class="row container">
                <div class="carousel carousel-slider">
                <?php
                    require 'php/conexion.php';
                    global $conexion;

                    $query = "SELECT imagen, comentarios FROM alumno where comentarios != '' LIMIT 5 ";
                    $sql = mysqli_query($conexion, $query);
                    
                    while($row = mysqli_fetch_array($sql))
                    {?>
                        <div class="carousel-item">
                            <div class="people">
                                <img class="circle responsive-img center-align" src="<?php echo $row['imagen']?>">
                            </div>
                            
                            <div class="people-text">
                                <p class="white-text"><?php echo $row['comentarios'];?></p>
                            </div>
                        </div><?php
                    }
                ?>
                </div>
            </div>
        </div>

        <div class="parallax-container">
            <div class="parallax"><img class="responsive-img" src="images/business-conference-learning-7095.jpg"></div>
        </div>

        <footer class="page-footer">
            <div class="container row">
                <div class="col s4">
                    <span class="support">Informacion de Contacto</span><br><br>
                    <img class="svg" src="icons/if_facebook_circle_294710.svg">
                    <img class="svg" src="icons/if_google_circle_color_107180.svg">
                    <img class="svg" src="icons/if_twitter_circle_294709.svg">
                    <img class="svg" src="icons/if_linkedin_circle_294706.svg"><br><br>

                    <div><i class="small material-icons contact">location_on</i><span class="text-contact">Direccion</span></div>
                    <div><i class="small material-icons contact">phone</i><span class="text-contact">Telefono</span></div>
                    <div><i class="small material-icons contact">email</i><span class="text-contact">Email</span></div>
                </div>

                <div class="col s4">
                    <form>
                        <div class="input-field">
                            <input id="name" type="text" class="white-text">
                            <label for="name">Nombre</label>
                        </div>

                        <div class="input-field">
                            <input id="email" type="email" class="white-text">
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field">
                            <input id="subject" type="text" class="white-text">
                            <label for="subject">Asunto</label>
                        </div>
                    </form>
                </div>

                <div class="col s4 form">
                    Mensaje:<textarea class="white-text"></textarea>
                    <br><br><br>
                    <button class="bttn-pill bttn-md bttn-primary right">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </footer>

        <!--JavaScript at end of body for optimized loading-->
        <script src="js/jquery.min.js"></script>
        <script src="js/materialize.min.js"></script>

        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenLite.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/CSSPlugin.min.js"></script>
        <script src="js/scrollissimo.min.js"></script>

        <script src="js/animsition.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
