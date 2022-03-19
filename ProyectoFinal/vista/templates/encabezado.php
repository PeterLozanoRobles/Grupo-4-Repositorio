<!-- parte inicial del documento-->
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->  
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/Styles.css" rel="stylesheet">
        
        
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <title>Floreria</title>
    </head> 
    <body style="background: lightblue;">
        <nav class="barraNavegacion navbar navbar-expand-md navbar-dark fixed-top" style="background: pink; border-style: dashed; border-color: white;">
            <a class="navbar-brand" href="index.php">Floreria De Guayaquil</a>
            <ul class="navbar-nav mr-auto">
             
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="index.php?c=home&f=index">Home</a></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="index.php?c=sucursal&a=index">Sucursales</a></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link"href="index.php?c=productos&a=index">Servicios</a></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="index.php?c=categorias&a=index">Catal&oacute;go</a></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="index.php?c=clientes&a=index">Clientes</a></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="index.php?c=productos&a=index">Empleado</a></li>
              
            </ul>  
            <ul class="navbar-nav ml-auto">
                <li class="nav-item my-auto" style=" background: lightblue; border-style: dashed; border-color: white; margin-right: 10px; padding: 10px;"><span style="color:white">Usuario </span></li>
                <li class="nav-item" style="background: lightblue; border-style: dashed; border-color: white; margin-right: 10px;"><a class="nav-link" href="#">Login</a></li>

            </ul>
        </nav><br>
        <div>
            <img src="assets/images/Logo.png">
            <h1 style="margin-top: 60px; background: lightblue; color: white;">Floreria</h1>
            <img src="assets/images/Logo.png" align="right">
        </div>
        
    </body>    

        <?php
        if (isset($_SESSION['mensaje']) and $_SESSION['mensaje'] != '') {
            ?>
            <div class="mt-2 alert alert-<?php echo $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['mensaje']; ?>  
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            unset($_SESSION['mensaje']);
            unset($_SESSION['color']);
        }//end if 
        ?>
        