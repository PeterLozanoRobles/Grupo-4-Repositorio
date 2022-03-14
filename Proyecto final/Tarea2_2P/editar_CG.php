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
<?php
include_once 'menu.php';
?>

<?php        
        // incluir archivo conexion.php
        require_once 'conexion.php';
     
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);

    $sql = "select * from sucursal where id = '" . $id . "'";
    $resultado = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
        <section class="registro-sucursales">
        <div>
        <form method="post">
                <input class="caja" type="hidden" name="txtid2" value="<?php echo $fila['id'] ?>">
                <div><label>Id:</label><input class="caja" type="text" name="txtid" readonly value="<?php echo $fila['id'] ?>"></div>
                <div><label>Nombre:</label><input class="caja" class="caja" type="text" name="txtNombre" value="<?php echo $fila['nombre'] ?>"></div>
                <div><label>Apellido:</label><input class="caja" type="text" name="txtApellido" value="<?php echo $fila['apellido'] ?>"></div>
                <div><label>Telefono:</label><input class="caja" type="text" name="txtTelefono" value="<?php echo $fila['telefono'] ?>"></div>
                
                <h5>Seleccione la Sucursal</h5><br>
                <div>
                    <input class="contenedorO"   type="radio" name="txtSucursal" value="Floreria KYS" checked=" <?php echo ($fila['sucursal']=="Floreria KYS")?"checked":""?>">Floreria KYS
                    </div>
                    <div>
                    <input class="contenedorO"  type="radio" name="txtSucursal" value="Floreria Guayaquil" checked=" <?php echo ($fila['sucursal']=="Floreria Guayaquil")?"checked":""?>">Floreria Guayaquil
                   </div>
                    <div>
                    <input class="contenedorO"   type="radio" name="txtSucursal" value="Tia Paraiso Flor" checked=" <?php echo ($fila['sucursal']=="Tia Paraiso Flor")?"checked":""?>">Tia Paraiso Flor
                  </div>
                <div><label>Fecha:</label>
                    <input class="caja"   type="date" name="txtFecha" value="<?php echo $fila['fecha'] ?>"><br>
                    <p style="color: red">Recuerde:</p><p>Solo atendemos de Lunes a Viernes...</p><br>
                </div>
                
 
                <div>
                <label>Hora:</label>
                <select class="caja" type="time" name="txtHora" value="<?php echo $fila['hora'] ?>"> <br>
                <option value="7:30">7:30</option>
                <option value="8:30">8:30</option>
                <option value="9:30">9:30</option>
                <option value="10:30">10:30</option>
            </select><br>
        </div>
                
                <div><input class="boton" type="submit" value="Actualizar"></div>
            </form>
        </div>
                
        
            </form>
        </div>
        
        
    <?php
    }
}
?>
</section>

<?php
if (!empty($_POST['txtid']) && !empty($_POST['txtNombre'])&& !empty($_POST['txtApellido']) && !empty($_POST['txtTelefono']) && !empty($_POST['txtSucursal']) && !empty($_POST['txtFecha']) && !empty($_POST['txtHora']) ) {
    $idp = htmlentities($_POST['txtid']);
    $nombre = htmlentities($_POST['txtNombre']);
    $apellido = htmlentities($_POST['txtApellido']);
    $telefono = htmlentities($_POST['txtTelefono']);
    $sucursal = htmlentities($_POST['txtSucursal']);
    $fecha = htmlentities($_POST['txtFecha']);
    $hora = htmlentities($_POST['txtHora']);


    $sql2 = "update sucursal set id =$idp, nombre ='$nombre', apellido ='$apellido', telefono ='$telefono', sucursal ='$sucursal', fecha ='$fecha', hora='$hora'  where id=$idp";

    if (mysqli_query($con, $sql2)) {
        // echo "Registro ingresado correctamente";
        header("location:presentar_CG.php"); //redireccionar
    } else {
        echo "Error: " . $sql2 . "" . mysqli_error($con);
    }
}
?>

<?php
include_once 'footer.php';
?> 
<?php
ob_end_flush();
?> 