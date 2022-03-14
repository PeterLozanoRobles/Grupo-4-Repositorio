<?php
include_once 'menu.php';
?>

<?php
   //include_once '../templates/header.php';
        
        // incluir archivo conexion.php
        require_once 'conexion.php';
     
if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);

    $sql = "select * from Nosotros where id = '" . $id . "'";
    $resultado = mysqli_query($con, $sql);
    while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
        <div>
        <form method="post">
                <input type="hidden" name="txtid2" value="<?php echo $fila['id'] ?>">
                <div><label>Id:</label><input type="text" name="txtid" readonly value="<?php echo $fila['id'] ?>"></div>
                <div><label>Nombre:</label><input type="text" name="txtNombre" value="<?php echo $fila['nombre'] ?>"></div>
                <div><label>Correo:</label><input type="text" name="txtCorreo" value="<?php echo $fila['correo'] ?>"></div>
                <div><input type="submit" value="Actualizar"></div>
            </form>
        </div>
    <?php
    }
}
?>


<?php
if (!empty($_POST['txtid']) && !empty($_POST['txtNombre']) && !empty($_POST['txtCorreo']) ) {
    $idp = htmlentities($_POST['txtid']);
    $nombre = htmlentities($_POST['txtNombre']);
    $correo = htmlentities($_POST['txtCorreo']);

    $sql2 = "update Nosotros set id =$idp, nombre ='$nombre', correo = '$correo'  where id=$idp";

    if (mysqli_query($con, $sql2)) {
        // echo "Registro ingresado correctamente";
        header("location:presentar_LM.php"); //redireccionar
    } else {
        echo "Error: " . $sql2 . "" . mysqli_error($con);
    }
}
?>

<?php
include_once 'footer.php';
?>