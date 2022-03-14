<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminacion de usuario</title>
    </head>
    <body>   
        <?php
           include_once '.../menu.php';
          ?>
        <?php
        
        // incluir archivo conexion.php
        require_once '.../conexion.php';
     
        if (!empty($_GET['Id'])) {
            $id = htmlentities($_GET['Id']);
            $sql = "select * from reservar where Id = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
            <div class="contenedor_form">
            <section class="form_reservacion">
                <h2>FORMULARIO DE RESERVACIÓN</h2>
                <input class="casillas" type="text" name="Nombres" id="nombre_casilla" value="<?php echo $fila['Nombres'] ?>">
                <input class="casillas" type="text" name="Apellidos" id="apellido_casilla" value="<?php echo $fila['Apellidos'] ?>" >
                <input class="casillas" type="email" name="Correo_Electronico" id="correo_casilla" value="<?php echo $fila['Email'] ?>">
                <input class="casillas" type="date" name="fecha" id="fecha_casilla" value="<?php echo $fila['Fecha'] ?>" min="2022-01-01" max="2022-12-29"><br>
                <input class="botones" type="submit" value="Enviar">               
            </section>
        </div> 
        <?php
            }
        }
        ?>
        <?php
      
        // incluir archivo conexion.php
        require_once 'conexion.php';


        if (!empty($_POST['usuario']) && !empty($_POST['email']) &&
                !empty($_POST['sexo']) && !empty($_POST['pass']) 
                && !empty($_POST['passConfirma']) && !empty($_POST['termino'])) {
            
            // variables
            $Nombres=htmlentities($_POST["Nombres"]);
            $email=isset($_POST["email"]) ? htmlentities($_POST["email"]) : '';
            $Apellidos=htmlentities($_POST["Apellidos"]);
            DateTime: $fecha=htmlentities($_POST["Fecha"]);
                                  
            $id = htmlentities($_GET['Id']);
            
            $sql = "update reservar set Nombres ='$Nombres', Email ='$email', Apellidos = '$Apellidos', "
                    . "Fecha = '$fecha' where Id =$id";
           
            if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:Presentar.php"); //redireccionar
            } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
            }
    }
    ?>
         
    <?php
        include_once 'footer.php';
     ?>  
    </body>
</html>

