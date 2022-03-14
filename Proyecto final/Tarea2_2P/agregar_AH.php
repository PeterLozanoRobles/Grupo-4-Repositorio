<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar</title>
    </head>
    <body>
        <?php
        include_once 'menu.php';  
        ?>
     
     <br><br>

        <div>
            <form method="post">
                <div> <label>ID</label>
                    <input type="number" name="txtid" readonly>
                </div><br>

                <div>
                    <label>NOMBRE:</label>
                    <input type="text" name="txtNombre">
                </div><br>

                <div>
                    <label>CORREO:</label>
                    <input type="text" name="txtCorreo">
                </div><br>

                <div>
                Ciudad:
                <input type="radio" name="txtCiudad" value="Guayaquil" > Guayaquil
                <input type="radio" name="txtCiudad" value="Quito" > Quito
                <input type="radio" name="txtCiudad" value="Loja" > Loja
                <input type="radio" name="txtCiudad" value="Ambator" > Ambato
            
                </div>

                <div>
                <p>Tipo de arreglo:
                <select name="menu">
                    <option name="arreglo[]" value="Circularr">Circular</option>
                    <option name="arreglo[]" value="Triangular">Triangular</option>
                    <option name="arreglo[]" value="Redondo">Redondo</option>
                </select>
            </p><br>
                </div>


                

                <input type="submit" value="Agregar">
                <input type="reset" value="Cancelar">
            </form>
        </div>
        <?php
      
        // incluir archivo conexion.php
        require_once 'conexion.php';


        if (!empty($_POST['txtNombre']) && !empty($_POST['txtCorreo']) && !empty($_POST['txtCiudad'])  ) {

$id = htmlentities($_POST['txtid']);
$nombre = htmlentities($_POST['txtNombre']);
$correo = htmlentities($_POST['txtCorreo']);
$ciudad = htmlentities($_POST['txtCiudad']);
$acad = htmlentities($_POST['acad']);

                $sql = "insert into Servicio( nombre, correo,ciudad, tipoArreglo) "
                . "values('$nombre','$correo','$ciudad','$_POST[menu]')";

                if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:presentar_AH.php"); //redireccionar
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