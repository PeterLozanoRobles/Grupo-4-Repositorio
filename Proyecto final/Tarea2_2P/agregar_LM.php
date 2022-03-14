<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets_LM/css/Style_LM_form.css">
        <link rel="stylesheet" href="Assets/css/Style.css"> 
        <title>Agregar</title>
    </head>
    <body>

    
    <?php
    include_once 'menu.php';
    ?>
     
     <BR><BR>

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
                Sexo:
                <input type="radio" name="txtSexo" value="Hombre" > Hombre
                <input type="radio" name="txtSexo" value="Mujer" > Mujer
            
                </div>

                <div>
                <p>Formación académica:
                <select name="menu">
                    <option name="acad[]" value="Bachiller">Bachiller</option>
                    <option name="acad[]" value="Tenologico">Tecnólogo</option>
                    <option name="acad[]" value="universidad">Universitario</option>
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


        if (!empty($_POST['txtNombre']) && !empty($_POST['txtCorreo']) && !empty($_POST['txtSexo'])  ) {

            $id = htmlentities($_POST['txtid']);
            $nombre = htmlentities($_POST['txtNombre']);
            $correo = htmlentities($_POST['txtCorreo']);
            $sexo = htmlentities($_POST['txtSexo']);
            $acad = htmlentities($_POST['acad']);

                $sql = "insert into Nosotros( nombre, correo,sexo, formacionAcademica) "
                . "values('$nombre','$correo','$sexo','$_POST[menu]')";

                if (mysqli_query($con, $sql)) {// si se ejecuto sin errores
                header("location:presentar_LM.php"); //redireccionar
                } else {
                echo "Error: " . $sql . "" . mysqli_error($con);
                }
        }
        ?>
        <BR>

        <?php
        include_once 'footer.php';
        ?>
        
    </body>
</html>