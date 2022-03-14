<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Tienda de flores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_PL_form/css/Style.css"/>     
    </head>
    <body>   
        <?php
        include_once '.../menu.php';
        ?>  
        
        <div class="contenedor_form">
            <section class="form_reservacion">
                <h2>FORMULARIO DE RESERVACI�N</h2>
                <input class="casillas" type="text" name="Nombres" id="nombre_casilla" placeholder="Ingrese sus nombres">
                <input class="casillas" type="text" name="Apellidos" id="apellido_casilla" placeholder="Ingrese sus apellidos">
                <input class="casillas" type="email" name="Correo_Electronico" id="correo_casilla" placeholder="Ingrese su Correo Electr�nico">
                <input class="casillas" type="password" name="Contrase�a" id="contrase�a_casilla" placeholder="Ingrese codigo de validaci�n">
                <input class="casillas" type="date" name="fecha" id="fecha_casilla" min="2022-01-01" max="2022-12-29"><br>
                <input class="botones" type="submit" value="Enviar">               
            </section>
        </div>           
        
        <?php
      
        // incluir archivo conexion.php
        require_once '.../conexion.php';


        if (!empty($_POST['Nombres']) && !empty($_POST['Apellidos']) &&
                !empty($_POST['Correo_Electronico']) && !empty($_POST['Contrase�a']) 
                && !empty($_POST['fecha'])) {
            
            // variables
            $Nombres=htmlentities($_POST["Nombres"]);
            $Apellidos= htmlentities($_POST["Apellidos"]);
            $email=isset($_POST["Correo_Electronico"]) ? htmlentities($_POST["Correo_Electronico"]) : '';
            $Contrase�a=htmlentities($_POST["Contrase�a"]);
            DateTime:$fecha=htmlentities($_POST["fecha"]);
            

            $sql = "insert into reservar (Nombres, Apellidos, Email, Contrase�a, Fecha) "
                    . "values('$Nombres','$Apellidos',$email','$Contrase�a','$fecha')";

            if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:Presentar.php"); //redireccionar
            } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
            }
    }
    ?>
        
     <?php
        include_once '.../footer.php';
     ?>            
    </body>
</html>
