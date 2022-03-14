<!DOCTYPE html>
<?php
ob_start();
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets_CG/css/style.css"/>
        <title>Agregar</title>
    </head>
    <body>
        <?php
        include_once 'menu.php';  
        ?>
     
     <br><br>
     <section class="registro-sucursales">
        <div>

            <form method="post">
                <div> <label>ID</label>
                    <input class="caja" type="number" name="txtId" readonly>
                </div><br>

                <div>
                    <label>NOMBRE:</label>
                    <input class="caja" type="text" name="txtNombre">
                </div><br>

                <div>
                    <label>APELLIDO:</label>
                    <input class="caja" type="text" name="txtApellido">
                </div><br>

                <div>
                    <label>TELEFONO:</label>
                    <input class="caja" type="text" name="txtTelefono">
                </div><br>

                
                <h5>Seleccione la Sucursal</h5><br>
                <div>
                <input class="contenedorO" type="radio" name="txtSucursal" value="Floreria KYS" >Floreria KYS
                </div>
                <div>
                <input class="contenedorO"  type="radio" name="txtSucursal" value="Floreria Guayaquil" >Floreria Guayaquil
                </div>
                <div>
                <input class="contenedorO"  type="radio" name="txtSucursal" value="Tia Paraiso Flor" > Tia Paraiso Flor
                </div>
                

                <div><label>Fecha:</label>
                    <input class="caja"    type="date" name="txtFecha"><br>
                    <p style="color: red">Recuerde:</p><p>Solo atendemos de Lunes a Viernes...</p><br>
                </div>

                <div>
                <label>Hora:</label>
                <select class="caja" type="time" name="txtHora">
                <option value="0">Elija una opcion </option>
                <option value="7:30">7:30</option>
                <option value="8:30">8:30</option>
                <option value="9:30">9:30</option>
                <option value="10:30">10:30</option>
            </select><br>
            </div>

                

                <input  class="boton"  type="submit" value="Agregar">
                
            </form>
        </div>
        <?php
      
        // incluir archivo conexion.php
        require_once 'conexion.php';


        if ( !empty($_POST['txtNombre'])  ) {

$id = htmlentities($_POST['txtId']);
$nombre = htmlentities($_POST['txtNombre']);
$apellido = htmlentities($_POST['txtApellido']);
$telefono = htmlentities($_POST['txtTelefono']);
$sucursal = htmlentities($_POST['txtSucursal']);
$fecha = htmlentities($_POST['txtFecha']);
$hora = htmlentities($_POST['txtHora']);

                $sql = "insert into sucursal( nombre,apellido,telefono,sucursal,fecha,hora) "
                . "values('$nombre','$apellido','$telefono','$_POST[txtSucursal]','$fecha','$hora')";

                if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:presentar_CG.php"); //redireccionar
                } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
                }
        }
        ?>
</section>
    <?php
        include_once 'footer.php';
     ?>     
    </body>
</html>
<?php
ob_end_flush();
?> 