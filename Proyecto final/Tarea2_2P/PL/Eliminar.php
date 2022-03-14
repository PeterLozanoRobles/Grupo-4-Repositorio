<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_PL_form/css/Style.css"/>  
        <title>Eliminacion de usuario</title>
    </head>
    <body>   
        <?php
           include_once '.../menu.php';
          ?>
        <p></p>
        <div class="contenedor">
        <div class="cabecera">
        <h2>Datos Eliminado</h2>
        </div>
         <?php
        
        // incluir archivo conexion.php
        require_once '.../conexion.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from reservar where Id = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
         <div class="contenedor_form">
            <section class="form_reservacion">
                <h2>FORMULARIO DE RESERVACIÓN</h2>
                <input class="casillas" type="text" name="Nombres" id="nombre_casilla" readonly value="<?php echo $fila['Nombres'] ?>" readonly>
                <input class="casillas" type="text" name="Apellidos" id="apellido_casilla" readonly value="<?php echo $fila['Apellidos'] ?>" readonly>
                <input class="casillas" type="email" name="Correo_Electronico" id="correo_casilla" readonly value="<?php echo $fila['Email'] ?>" readonly>
                <input class="casillas" type="date" name="fecha" id="fecha_casilla" min="2022-01-01" max="2022-12-29" readonly value="<?php echo $fila['Fecha'] ?>" readonly><br>
                <input class="botones" type="submit" value="Eliminar">               
            </section>
        </div>   
    
        <?php
            }
        }
        ?>
    
        <?php
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "delete from reservar where Id = $id ";
          if(mysqli_query($con, $sql)){
                 header("location:Presentar.php");            
          }else{             
          }         
        }
        ?>
         </div>
         
    <?php
        include_once '.../footer.php';
     ?>  
    </body>
</html>

