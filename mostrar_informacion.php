<?php
require_once 'php/conexion.php';

function areas()
{
    global $conexion;

    $query = "SELECT area , count(*) as cant FROM posts GROUP BY area ORDER BY area;";
    $areas  = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($areas))
    {
        $nombre = $row['area'];

        switch($nombre)
        {
            case 'Administracion': $link = 'avisos.php?opcion=administracion&pagina=1'; break;
            case 'Construccion': $link = 'avisos.php?opcion=construccion&pagina=1'; break;
            case 'Finanzas': $link = 'avisos.php?opcion=finanzas&pagina=1'; break;
            case 'Ingenieria': $link = 'avisos.php?opcion=ingenieria&pagina=1'; break;
            case 'Medicina': $link = 'avisos.php?opcion=medicina&pagina=1'; break;
            case 'Secretaria': $link = 'avisos.php?opcion=secretaria&pagina=1'; break;
            case 'Tecnologia': $link = 'avisos.php?opcion=tecnologia&pagina=1'; break;
            case 'Ventas': $link = 'avisos.php?opcion=ventas&pagina=1'; break;
        }
        ?>
        <div class="collapsible-body"><a href="<?php echo $link?>.php">
        <?php
        echo $row['area'];?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function contratos()
{
    global $conexion;

    $query = "SELECT contrato , count(*) as cant FROM posts GROUP BY contrato ORDER BY contrato;";
    $contrato  = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($contrato))
    {
        $nombre = $row['contrato'];
        
        switch($nombre)
        {
            case 'Contrato a Plazo Fijo': $link = 'avisos.php?opcion=plazofijo&pagina=1'; break;
            case 'Contrato Eventual': $link = 'avisos.php?opcion=eventual&pagina=1'; break;
            case 'Otro tipo de contrato': $link = 'avisos.php?opcion=otrocontrato&pagina=1'; break;
            case 'Pasantia': $link = 'avisos.php?opcion=pasantia&pagina=1'; break;
        }
        ?>

        <div class="collapsible-body"><a href="<?php echo $link;?>.php">
        <?php
        echo $nombre;?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function empresas()
{
    global $conexion;

    $query = "SELECT empresa , count(*) as cant FROM posts GROUP BY empresa ORDER BY empresa;";
    $empresa  = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($empresa))
    {
        $nombre = $row['empresa'];

        switch($nombre)
        {
            case 'Aca Salud': $link = 'avisos.php?opcion=acasalud&pagina=1'; break;
            case 'Adecco': $link = 'avisos.php?opcion=adecco&pagina=1'; break;
            case 'Autos del Sur': $link = 'avisos.php?opcion=autosdelsur&pagina=1'; break;
            case 'BairesDev': $link = 'avisos.php?opcion=bairesdev&pagina=1'; break;
            case 'BBVA Frances': $link = 'avisos.php?opcion=bbvafrances&pagina=1'; break;
            case 'Capital Humano': $link = 'avisos.php?opcion=capitalhumano&pagina=1'; break;
            case 'Chaxxel Recursos Humanos': $link = 'avisos.php?opcion=chaxxel&pagina=1'; break;
            case 'Confidencial': $link = 'avisos.php?opcion=confidencial&pagina=1'; break;
            case 'EBM Consultores': $link = 'avisos.php?opcion=ebm&pagina=1'; break;
            case 'Edfan': $link = 'avisos.php?opcion=edfan&pagina=1'; break;
            case 'ETT Fastar Argentina': $link = 'avisos.php?opcion=ett&pagina=1'; break;
            case 'Insignia Talento': $link = 'avisos.php?opcion=insigniatalento&pagina=1'; break;
            case 'Manpower': $link = 'avisos.php?opcion=manpower&pagina=1'; break;
            case 'Neustadt Fischer': $link = 'avisos.php?opcion=neustadt&pagina=1'; break;
            case 'Randstad': $link = 'avisos.php?opcion=randstad&pagina=1'; break;
        }

        ?>
        <div class="collapsible-body"><a href="<?php echo $link;?>.php">
        <?php
        echo $nombre?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function institucion()
{
    global $conexion;

    $query = "SELECT institucion , count(*) AS cant FROM posts GROUP BY institucion ORDER BY institucion;";
    $institucion  = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($institucion))
    {
        $nombre = $row['institucion'];
        
        switch($nombre)
        {
            case 'UNS': $link = 'avisos.php?opcion=uns&pagina=1'; break;
            case 'UTN': $link = 'avisos.php?opcion=utn&pagina=1'; break;
        }?>

        <div class="collapsible-body"><a href="<?php echo $link?>">
        <?php echo $nombre?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function jornada()
{
    global $conexion;

    $query = "SELECT jornada , count(*) as cant FROM posts GROUP BY jornada ORDER BY jornada;";
    $jornada = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($jornada))
    {
        $nombre = $row['jornada'];

        switch($nombre)
        {
            case 'Part-Time': $link = 'avisos.php?opcion=parttime&pagina=1'; break;
            case 'Full-Time': $link = 'avisos.php?opcion=fulltime&pagina=1'; break;
        }

        ?>
        <div class="collapsible-body"><a href="<?php echo $link;?>.php">
        <?php echo $row['jornada'];?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function nivel()
{
    global $conexion;

    $query = "SELECT nivel , count(*) as cant FROM posts GROUP BY nivel ORDER BY nivel;";
    $nivel  = mysqli_query($conexion, $query);

    while($row = mysqli_fetch_array($nivel))
    {
        $nombre = $row['nivel'];
        
        switch($nombre)
        {
            case 'Jefe/Supervisor/Responsable': $link = 'avisos.php?opcion=jefe&pagina=1'; break;
            case 'Senior/Semi-Senior': $link = 'avisos.php?opcion=senior&pagina=1'; break;
            case 'Junior': $link = 'avisos.php?opcion=junior&pagina=1'; break;
        }
        ?>

        <div class="collapsible-body"><a href="<?php echo $link;?>">
        <?php echo $nombre?>
        (<?php echo $row['cant'];?>)
        </a></div><?php
    }
}

function salario()
{
    global $conexion;
    
    $query = "SELECT count(*) as cant FROM posts WHERE (salario <= 10000);";
    $salario  = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($salario)
    ?>
    
    <div class="collapsible-body"><a href="avisos.php?opcion=10000&pagina=1">$0 - $10.000 (<?php echo $row['cant']?>)</a></div>

    <?php
    $query = "SELECT count(*) as cant FROM posts WHERE (10000 < salario AND salario <= 15000);";
    $salario  = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($salario)
    ?>

    <div class="collapsible-body"><a href="avisos.php?opcion=15000&pagina=1">$10.000 - $15.000 (<?php echo $row['cant']?>)</a></div>

    <?php
    $query = "SELECT count(*) as cant FROM posts WHERE (15000 < salario AND salario <= 20000);";
    $salario  = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($salario)
    ?>

    <div class="collapsible-body"><a href="avisos.php?opcion=20000&pagina=1">$15.000 - $20.000 (<?php echo $row['cant']?>)</a></div>

    <?php
    $query = "SELECT count(*) as cant FROM posts WHERE salario > 20000;";
    $salario  = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($salario)
    ?>

    <div class="collapsible-body"><a href="avisos.php?opcion=21000&pagina=1">+$20.000 (<?php echo $row['cant']?>)</a></div>

    <?php
}
?>