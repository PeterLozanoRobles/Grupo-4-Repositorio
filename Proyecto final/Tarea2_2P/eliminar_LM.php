<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <?php
        include_once 'menu.php';
        ?>

        <?php
        // incluir archivo conexion.php
        require_once 'conexion.php';
     
        if (!empty($_GET['id'])) {
            $id = htmlentities($_GET['id']);
            $sql = "select * from Nosotros where id = $id";
            $resultado = mysqli_query($con, $sql);

            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <div>
                    <form method="post">
                        <label>Id:</label><input type="text" name="txtid" readonly 
                                                 value="<?php echo $fila['id'] ?>" readonly>
                       <label>Nombre:</label><input type="text" name="txtNombre" 
                                                     value="<?php echo $fila['nombre'] ?>" readonly>
                     
                    
                     
                       
                       <input type="submit" value="Eliminar">
                    </form>

                </div>
            <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['txtid']) && !empty($_POST['txtid'])) {
            $id = htmlentities($_POST['txtid']);

            $sql = "delete from Nosotros where id = $id ";

          if(mysqli_query($con, $sql)){
                 //header("location:presentar_LM.php");
                 header("Location: buscar_LM.php");
              
          }else{
                   
          }
         
        }
        ?>

        <?php
        include_once 'footer.php';
        ?>


    </body>
</html>